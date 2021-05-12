<?php

class Testimonial extends ServiceBase {

    private $table = "testimonial";

    public function addTestimonial() {
        try {
            $db = ServiceBase::connect();

            $sl = "SELECT event, date_event FROM " . $this->table . " WHERE event LIKE :event AND date_event = :date_event";

            $stmt = $db->prepare($sl);

            $stmt->bindParam(':event', $this->event);
            $stmt->bindParam(':date_event', $this->date_event);

            $stmt->execute();

            $result = array();
            while ( $line = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                array_push($result, $line);
            }

            if (empty($result)) {
                $query = "INSERT INTO " . $this->table . " SET id = :id, event = :event, text = :text, date_event = :date_event, workload = :workload";

                $stmt = $db->prepare($query);

                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':event', $this->event);
                $stmt->bindParam(':text', $this->text);
                $stmt->bindParam(':date_event', $this->date_event);
                $stmt->bindParam(':workload', $this->workload);

                if ($stmt->execute())
                    return true;

                printf("Error %s. \n", $stmt->error);

                return false;
            }

            return false;
        } catch (PDOException $e) {
            ServiceBase::error($e, __METHOD__);
        }
    }

    public function delTestimonial() {
        try {
            $db = ServiceBase::connect();

            $query = "DELETE FROM " . $this->table . " WHERE id = :id LIMIT 1";

            $stmt = $db->prepare($query);
            $stmt->bindParam(":id", $this->id);

            if ($stmt->execute())
                return true;

            printf("Error %s. \n", $stmt->error);

            return false;
        } catch (PDOException $e) {
            ServiceBase::error($e, __METHOD__);
        }
    }

    public function readTestimonial() {
        try {
            $db = ServiceBase::connect();

            $query = "SELECT * FROM " . $this->table . " ORDER BY event";

            $stmt = $db->query($query);
            $stmt->execute();

            $result = array();
            while ( $line = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                array_push($result, $line);
            }

            return $result;
        } catch (PDOException $e) {
            ServiceBase::error($e, __METHOD__);
        }
    }

    public function readTokenTestimonial() {
        try {
            $db = ServiceBase::connect();

            $query = "SELECT * FROM " . $this->table . " WHERE id = :id";

            $stmt = $db->prepare($query);

            $stmt->bindParam(':id', $this->id);			
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        } catch (PDOException $e) {
            ServiceBase::error($e, __METHOD__);
        }
    }

}

?>