<?php

class SponsorNoticeModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getAmount($pid)
    {
        $query = "SELECT Amount FROM sponsor_notice WHERE P_ID = $pid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

}