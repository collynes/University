$ php artisan tinker
Psy Shell v0.9.6 (PHP 7.1.9 — cli) by Justin Hileman
>>> echo 1
1⏎
>>> echo 1+2
3⏎
>>> namespace App
>>> $victor = Student::find(1)
=> App\Student {#753
     id: 1,
     fname: "Collins",
     lname: "Winch",
     gender: "M",
     dob: "2018-08-22 00:00:00",
     email: "collynes@gmail.com",
     phone: "711180014",
     created_at: "2018-08-17 09:11:15",
     updated_at: "2018-08-17 09:11:15",
   }
>>> Student::all()
=> Illuminate\Database\Eloquent\Collection {#101
     all: [
       App\Student {#755
         id: 1,
         fname: "Collins",
         lname: "Winch",
         gender: "M",
         dob: "2018-08-22 00:00:00",
         email: "collynes@gmail.com",
         phone: "711180014",
         created_at: "2018-08-17 09:11:15",
         updated_at: "2018-08-17 09:11:15",
       },
       App\Student {#749
         id: 2,
         fname: "Onesmus",
         lname: "Kahia",
         gender: "M",
         dob: "2018-08-22 00:00:00",
         email: "okahia@gmail.com",
         phone: "+254711180014",
         created_at: "2018-08-17 09:47:00",
         updated_at: "2018-08-17 09:47:00",
       },
       App\Student {#754
         id: 3,
         fname: "Collins2",
         lname: "Winch2",
         gender: "M",
         dob: "2018-08-16 00:00:00",
         email: "collynes@gmail.com",
         phone: "711180014",
         created_at: "2018-08-17 09:48:23",
         updated_at: "2018-08-17 09:48:23",
       },
       App\Student {#756
         id: 4,
         fname: "Onesmum",
         lname: "Kadem",
         gender: "F",
         dob: "2018-08-10 00:00:00",
         email: "collynes@gmail.com",
         phone: "711180014",
         created_at: "2018-08-17 09:50:08",
         updated_at: "2018-08-17 09:50:08",
       },
     ],
   }
>>> namespace App
>>> Course::all()
=> Illuminate\Database\Eloquent\Collection {#758
     all: [
       App\Course {#759
         id: 1,
         course: "Infomation Technology",
         description: "the study or use of systems (especially computers and tel
ecommunications) for storing, retrieving, and sending information.",
         created_at: "2018-08-02 00:00:00",
         updated_at: "2018-08-03 00:00:00",
       },
       App\Course {#760
         id: 2,
         course: "Mass Comm",
         description: "TV and Radio",
         created_at: "2018-08-23 00:00:00",
         updated_at: "2018-08-21 00:00:00",
       },
       App\Course {#761
         id: 3,
         course: "Diploma in Project Management",
         description: "Agile Project Management",
         created_at: "2018-08-17 09:32:29",
         updated_at: "2018-08-17 09:32:29",
       },
       App\Course {#762
         id: 4,
         course: "Bsc CS",
         description: "Computer Science",
         created_at: "2018-08-17 09:34:03",
         updated_at: "2018-08-17 09:34:03",
       },
     ],
   }
>>>
ckemboi@DIGITALBANK16 MINGW64 /c/xampp/htdocs/University
$ php artisan tinker
Psy Shell v0.9.6 (PHP 7.1.9 — cli) by Justin Hileman
>>> namespace App
>>> Student::all()
=> Illuminate\Database\Eloquent\Collection {#748
     all: [],
   }
>>> Student::all()
=> Illuminate\Database\Eloquent\Collection {#746
     all: [],
   }
>>> Course:all()
PHP Fatal error:  Call to undefined function all() in Psy Shell code on line 1
>>> Course::all()
=> Illuminate\Database\Eloquent\Collection {#754
     all: [],
   }
>>>
ckemboi@DIGITALBANK16 MINGW64 /c/xampp/htdocs/University
$ php artisan tinker
Psy Shell v0.9.6 (PHP 7.1.9 — cli) by Justin Hileman
>>> namespace App
>>> Student::all()
=> Illuminate\Database\Eloquent\Collection {#748
     all: [],
   }
>>> Course::all()
=> Illuminate\Database\Eloquent\Collection {#746
     all: [],
   }
>>> $vic = new Student
=> App\Student {#743}
>>> $vic->fname = "Victors"
=> "Victors"
>>> $vic->lname = "nay"
=> "nay"
>>> $vic->gender = "m"
=> "m"
>>> $vic->email = "me@you.com"
=> "me@you.com"
>>> $vic->phone = "1234"
=> "1234"
>>> $vic->save()
=> true
>>> $vic = Student::find(1)
=> App\Student {#753
     id: 1,
     fname: "Victors",
     lname: "nay",
     gender: "m",
     dob: "2018-08-17 16:53:41",
     email: "me@you.com",
     phone: "1234",
     created_at: "2018-08-17 13:53:41",
     updated_at: "2018-08-17 13:53:41",
   }
>>> $vic->courses()
=> Illuminate\Database\Eloquent\Relations\BelongsToMany {#741}
>>> $vic->courses()->get()
Illuminate/Database/QueryException with message 'SQLSTATE[42S02]: Base table or
view not found: 1146 Table 'university.course_student' doesn't exist (SQL: selec
t `courses`.*, `course_student`.`student_id` as `pivot_student_id`, `course_stud
ent`.`course_id` as `pivot_course_id` from `courses` inner join `course_student`
 on `courses`.`id` = `course_student`.`course_id` where `course_student`.`studen
t_id` = 1)'
>>> $vic->courses()->all()
BadMethodCallException with message 'Call to undefined method Illuminate/Databas
e/Query/Builder::all()'
>>> $vic->courses->all()
Illuminate/Database/QueryException with message 'SQLSTATE[42S02]: Base table or
view not found: 1146 Table 'university.course_student' doesn't exist (SQL: selec
t `courses`.*, `course_student`.`student_id` as `pivot_student_id`, `course_stud
ent`.`course_id` as `pivot_course_id` from `courses` inner join `course_student`
 on `courses`.`id` = `course_student`.`course_id` where `course_student`.`studen
t_id` = 1)'
>>> $vic->course
>>>
>>>
>>>
>>>


ckemboi@DIGITALBANK16 MINGW64 /c/xampp/htdocs/University
$ php artisan tinker
Psy Shell v0.9.6 (PHP 7.1.9 — cli) by Justin Hileman
>>> namespace App
>>> $vic->fname = "Victors"
PHP Warning:  Creating default object from empty value in Psy Shell code on line
 3
>>> $vic = new Student
=> App\Student {#746}
>>> $vic->fname = "Victors"
=> "Victors"
>>> $vic->lname = "nay"
=> "nay"
>>> $vic->gender = "m"
=> "m"
>>> $vic->email = "me@you.com"
=> "me@you.com"
>>> $vic->phone = "1234"
=> "1234"
>>> $vic->save()
=> true
>>> $vic = Student::find(1)
=> App\Student {#756
     id: 1,
     fname: "Victors",
     lname: "nay",
     gender: "m",
     dob: "2018-08-17 16:59:39",
     email: "me@you.com",
     phone: "1234",
     created_at: "2018-08-17 13:59:39",
     updated_at: "2018-08-17 13:59:39",
   }
>>> $vic->courses()
=> Illuminate\Database\Eloquent\Relations\BelongsToMany {#742}
>>> $vic->courses->all()
=> []
>>> $vic->courses->all()
=> []
>>>
ckemboi@DIGITALBANK16 MINGW64 /c/xampp/htdocs/University
$ php artisan tinker
Psy Shell v0.9.6 (PHP 7.1.9 — cli) by Justin Hileman
>>> $vic->courses->all()
PHP Notice:  Undefined variable: vic in Psy Shell code on line 1
>>> $vic = Student::find(1)
[!] Aliasing 'Student' to 'App\Student' for this Tinker session.
=> App\Student {#752
     id: 1,
     fname: "Victors",
     lname: "nay",
     gender: "m",
     dob: "2018-08-17 16:59:39",
     email: "me@you.com",
     phone: "1234",
     created_at: "2018-08-17 13:59:39",
     updated_at: "2018-08-17 13:59:39",
   }
>>> $vic->courses->all()
=> [
     App\Course {#756
       id: 1,
       course: "IT",
       description: "Information Technology",
       created_at: "2018-08-15 00:00:00",
       updated_at: "2018-08-09 00:00:00",
       pivot: Illuminate\Database\Eloquent\Relations\Pivot {#101
         student_id: 1,
         course_id: 1,
       },
     },
     App\Course {#748
       id: 2,
       course: "Bcom",
       description: "Business Commercr",
       created_at: "2018-08-23 00:00:00",
       updated_at: "2018-08-16 00:00:00",
       pivot: Illuminate\Database\Eloquent\Relations\Pivot {#736
         student_id: 1,
         course_id: 2,
       },
     },
   ]
>>> $vic->courses->count()
=> 2
>>> Course::all()
[!] Aliasing 'Course' to 'App\Course' for this Tinker session.
=> Illuminate\Database\Eloquent\Collection {#746
     all: [
       App\Course {#755
         id: 1,
         course: "IT",
         description: "Information Technology",
         created_at: "2018-08-15 00:00:00",
         updated_at: "2018-08-09 00:00:00",
       },
       App\Course {#759
         id: 2,
         course: "Bcom",
         description: "Business Commercr",
         created_at: "2018-08-23 00:00:00",
         updated_at: "2018-08-16 00:00:00",
       },
     ],
   }
>>> $c = Course::find(1)
=> App\Course {#763
     id: 1,
     course: "IT",
     description: "Information Technology",
     created_at: "2018-08-15 00:00:00",
     updated_at: "2018-08-09 00:00:00",
   }
>>> $c->students
=> Illuminate\Database\Eloquent\Collection {#740
     all: [
       App\Student {#743
         id: 1,
         fname: "Victors",
         lname: "nay",
         gender: "m",
         dob: "2018-08-17 16:59:39",
         email: "me@you.com",
         phone: "1234",
         created_at: "2018-08-17 13:59:39",
         updated_at: "2018-08-17 13:59:39",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#755
           course_id: 1,
           student_id: 1,
         },
       },
     ],
   }
>>>
