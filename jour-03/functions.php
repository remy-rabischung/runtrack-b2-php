<?php

function getStudentsData(): array {
    return [
        ['id' => 1, 'grade_id' => 1, 'email' => 'student1@example.com', 'fullname' => 'John Doe', 'birthdate' => '2000-01-01', 'gender' => 'male'],
        ['id' => 2, 'grade_id' => 2, 'email' => 'student2@example.com', 'fullname' => 'Jane Smith', 'birthdate' => '1998-05-15', 'gender' => 'female'],
        // Ajoutez plus de données ici si nécessaire
    ];
}

function getGradesData(): array {
    return [
        ['id' => 1, 'name' => 'Bachelor 1', 'year' => '2023-01-09'],
        ['id' => 2, 'name' => 'Bachelor 2', 'year' => '2022-01-09'],
        // Ajoutez plus de données ici si nécessaire
    ];
}

function getRoomsData(): array {
    return [
        ['id' => 1, 'floor_id' => 1, 'name' => 'RDC Food and Drinks', 'capacity' => 90],
        ['id' => 2, 'floor_id' => 1, 'name' => 'Sound Studio', 'capacity' => 5],
        // Ajoutez plus de données ici si nécessaire
    ];
}

function getFloorsData(): array {
    return [
        ['id' => 1, 'name' => 'Rez-de-chaussée', 'level' => 0],
        ['id' => 2, 'name' => '1er étage', 'level' => 1],
        // Ajoutez plus de données ici si nécessaire
    ];
}

// Simulation des fonctions findOne en parcourant les tableaux
function findOneStudent(int $id): ?Student {
    $students = getStudentsData();
    foreach ($students as $student) {
        if ($student['id'] === $id) {
            return new Student($student['id'], $student['grade_id'], $student['email'], $student['fullname'], new DateTime($student['birthdate']), $student['gender']);
        }
    }
    return null;
}

function findOneGrade(int $id): ?Grade {
    $grades = getGradesData();
    foreach ($grades as $grade) {
        if ($grade['id'] === $id) {
            return new Grade($grade['id'], $grade['name'], new DateTime($grade['year']));
        }
    }
    return null;
}

function findOneRoom(int $id): ?Room {
    $rooms = getRoomsData();
    foreach ($rooms as $room) {
        if ($room['id'] === $id) {
            return new Room($room['id'], $room['floor_id'], $room['name'], $room['capacity']);
        }
    }
    return null;
}

function findOneFloor(int $id): ?Floor {
    $floors = getFloorsData();
    foreach ($floors as $floor) {
        if ($floor['id'] === $id) {
            return new Floor($floor['id'], $floor['name'], $floor['level']);
        }
    }
    return null;
}

?>
