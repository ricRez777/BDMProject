<?php 

    require_once "conection.php";
    
    class news{

        private $id_News;
        private $title;
        private $description;
        private $textNews;
        private $eventDate;
        private $publicationDate;
        private $location;
        private $keywords;
        private $statusNews;
        private $front;
        private $id_Section;
        private $id_Use;
        

        /*Constructor*/
        function __construct($id_NewsP, $titleP, $descriptionP, $textNews, $eventDateP, $publicationDateP, $locationP, $keywordsP, $statusNewsP, $frontP, $id_SectionP, $id_UseP){

            $this->id_News = $id_NewsP;
            $this->title = $titleP;
            $this->description = $descriptionP;
            $this->textNews = $textNews;
            $this->eventDate = $eventDateP;
            $this->publicationDate = $publicationDateP;
            $this->location = $locationP;
            $this->keywords = $keywordsP;
            $this->statusNews = $statusNewsP;
            $this->front = $frontP;
            $this->id_Section = $id_SectionP;
            $this->id_Use = $id_UseP;

            $this->objConection = new Conection();
        }
    }

?>