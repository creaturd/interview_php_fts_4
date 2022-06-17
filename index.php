<?php
require_once "MySQLConnect.php";

echo "Hi! Please follow the README instructions! <br></br>";

print "<pre>";
print_r(getSpecies());
print "</pre>";

getCountCovid();

function getSpecies() {
    $db = new MySQLConnect();
    $db->connect("mysql-rfam-public.ebi.ac.uk", 4497, "Rfam", "rfamro", null);

    $species = $db->query('SELECT DISTINCT author.name, taxonomy.species
                FROM taxonomy
                	JOIN family_ncbi
                		ON taxonomy.ncbi_id = family_ncbi.ncbi_id
                	JOIN family
                		ON family_ncbi.rfam_acc = family.rfam_acc
                	JOIN family_author
                		ON family.rfam_acc = family_author.rfam_acc
                	JOIN author
                		ON family_author.author_id = author.author_id
                WHERE author.last_name = \'Chen\' OR author.last_name = \'Petrov\'
                ORDER BY author.last_name ASC, taxonomy.species ASC');


    $result = array();
    foreach ($species as $object) {
        $result[$object->name][] = $object->species;
    }

    return $result;
}

function getCountCovid() {
    $db = new MySQLConnect();
    $db->connect("mysql-rfam-public.ebi.ac.uk", 4497, "Rfam", "rfamro", null);

    $Covid19viruses = $db->query('SELECT *
                           FROM genome
                           WHERE scientific_name = \'Severe acute respiratory syndrome coronavirus 2\'
                           OR description LIKE \'%Severe acute respiratory syndrome coronavirus 2%\'
                           OR description LIKE \'%SARS-CoV-2%\'');

    echo ($db->count());
}



