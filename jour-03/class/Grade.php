<?php

class Grade {
    private int $id;
    private string $name;
    private DateTime $year;

    public function __construct(int $id = 0, string $name = "", DateTime $year = null) {
        $this->id = $id;
        $this->name = $name;
        $this->year = $year ?: new DateTime();
    }

    // Getters et Setters

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getYear(): DateTime {
        return $this->year;
    }

    public function setYear(DateTime $year): void {
        $this->year = $year;
    }

    // Méthode getStudents déjà définie
    public function getStudents(): array {
        $studentsData = getStudentsData();
        $students = [];
        foreach ($studentsData as $student) {
            if ($student['grade_id'] === $this->id) {
                $students[] = new Student($student['id'], $student['grade_id'], $student['email'], $student['fullname'], new DateTime($student['birthdate']), $student['gender']);
            }
        }
        return $students;
    }
}

?>
