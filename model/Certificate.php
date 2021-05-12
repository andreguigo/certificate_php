<?php

class Certificate extends ServiceBase {

	private $table = "certificate";

    public function addCertificate() {
        try {
            $db = ServiceBase::connect();

            $sl = "SELECT licensed FROM " . $this->table . " WHERE licensed LIKE :licensed";

            $stmt = $db->prepare($sl);

            $stmt->bindParam(':licensed', $this->licensed);
            $stmt->execute();

            $result = array();
            while ( $line = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                array_push($result, $line);
            }

            if (empty($result)) {
                $query = "INSERT INTO " . $this->table . " SET id = :id, licensed = :licensed, name = :name, email = :email, testimonial_id = :testimonial_id, date_sign = :date_sign";

                $stmt = $db->prepare($query);

                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':licensed', $this->licensed);
                $stmt->bindParam(':name', $this->name);
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':testimonial_id', $this->testimonial_id);
                $stmt->bindParam(':date_sign', $this->date_sign);

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

    public function delCertificate() {
        try {
            $db = ServiceBase::connect();

            $query = "DELETE FROM " . $this->table . " WHERE licensed = :licensed LIMIT 1";

            $stmt = $db->prepare($query);
            $stmt->bindParam(":licensed", $this->licensed);

            if ($stmt->execute())
                return true;

            printf("Error %s. \n", $stmt->error);

            return false;
        } catch (PDOException $e) {
            ServiceBase::error($e, __METHOD__);
        }
    }

	public function readCertificate() {
		try {
			$db = ServiceBase::connect();

			$query = "SELECT * FROM " . $this->table . " ORDER BY name";

			$stmt = $db->query($query);
			$stmt->execute();

			$result = array();
			while ($line = $stmt->fetch(PDO::FETCH_ASSOC)) {
				array_push($result, $line);
			}

			return $result;
		} catch (PDOException $e) {
			ServiceBase::error($e, __METHOD__);
		}
	}

	public function readTokenCertificate() {
		try {
			$db = ServiceBase::connect();

			$query = "SELECT * FROM " . $this->table . " WHERE licensed = ?";
			
			$stmt = $db->prepare($query);
			
			$stmt->bindParam(1, $this->licensed);
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			return $row;
		} catch (PDOException $e) {
			ServiceBase::error($e, __METHOD__);
		}
	}

}

?>