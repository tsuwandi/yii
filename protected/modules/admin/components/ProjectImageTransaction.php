<?php

    class ProjectImageTransaction extends CComponent {

        public $project;
        public $projectImage;

        public function __construct($project, $projectImage)
        {
            $this->project = $project;
            $this->projectImage = $projectImage;
        }

        public function save($dbConnection)
        {
            $dbTransaction = $dbConnection->beginTransaction();
            try {
                $valid = $this->validate() && $this->flush();
                if ($valid)
                    $dbTransaction->commit();
                else
                    $dbTransaction->rollback();
            } catch (Exception $e) {
                $dbTransaction->rollback();
                $valid = false;
            }

            return $valid;
        }

        public function validate()
        {
            $valid = $this->project->validate(array('files'));

            $valid = $this->projectImage->validate(array('project_id', 'admin_id')) && $valid;

            return $valid;
        }

        public function flush()
        {
            require_once( dirname(Yii::app()->request->scriptFile) . '/protected/extensions/phpthumb/ThumbLib.inc.php' );

            $valid = true;

            foreach ($this->project->files as $file) {
                $projectImage = new ProjectImage();
                $projectImage->project_id = $this->projectImage->project_id;
                $projectImage->file_extension = $file->extensionName;
                $projectImage->admin_id = Yii::app()->user->id;
                $valid = $projectImage->save(false) && $valid;

                $originalPath = dirname(Yii::app()->request->scriptFile) . '/images/project/projectImage/' . $projectImage->filename;
                $file->saveAs($originalPath);
                $image = PhpThumbFactory::create($originalPath);
                $image->resize(600, 420)->save($originalPath);
            }

            return $valid;
        }

    }
    