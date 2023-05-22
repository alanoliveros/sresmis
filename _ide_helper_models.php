<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Address
 *
 * @property int $id
 * @property int $userId
 * @property string|null $purok
 * @property string|null $barangay
 * @property string|null $city
 * @property string|null $province
 * @property int|null $zipCode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereBarangay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePurok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereZipCode($value)
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Admission
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AdmissionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Admission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admission whereUpdatedAt($value)
 */
	class Admission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClassSchedule
 *
 * @property int $id
 * @property int $subjectId
 * @property int $sectionId
 * @property int $teacherId
 * @property int $grade_level_id
 * @property string $startTime
 * @property string $endTime
 * @property string $scheduleDay
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $school_year
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule whereGradeLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule whereScheduleDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule whereSchoolYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSchedule whereUpdatedAt($value)
 */
	class ClassSchedule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DailyAttendance
 *
 * @property int $id
 * @property int $adminId
 * @property int $teacherId
 * @property int $gradeLevelId
 * @property int $sectionId
 * @property int $studentId
 * @property int $school_year
 * @property string $date
 * @property string $month
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance query()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance whereGradeLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance whereSchoolYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyAttendance whereUpdatedAt($value)
 */
	class DailyAttendance extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Enrollment
 *
 * @property int $id
 * @property int|null $enrollment_status
 * @property int|null $student_id
 * @property int|null $adminId
 * @property string|null $lrn
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string|null $suffix
 * @property string|null $ethnic_group
 * @property string|null $mothertongue
 * @property string|null $religion
 * @property string|null $date_of_birth
 * @property string|null $gender
 * @property string|null $purok
 * @property string|null $barangay
 * @property string|null $city
 * @property string|null $province
 * @property int|null $grade_level_id
 * @property int|null $section_id
 * @property int|null $teacher_id
 * @property string|null $school_year
 * @property string|null $current_status
 * @property int|null $is_dropped_out
 * @property string|null $is_dropped_out_date
 * @property int|null $is_transferred_out
 * @property string|null $is_transferred_out_date
 * @property int|null $is_transferred_in
 * @property string|null $is_transferred_in_date
 * @property string|null $date_enrolled
 * @property string|null $date_dropped
 * @property string|null $date_transferred_in
 * @property string|null $date_transferred_out
 * @property string|null $moving_up_status
 * @property string|null $academic_status
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereAcademicStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereBarangay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereCurrentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereDateDropped($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereDateEnrolled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereDateTransferredIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereDateTransferredOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereEnrollmentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereEthnicGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereGradeLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereIsDroppedOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereIsDroppedOutDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereIsTransferredIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereIsTransferredInDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereIsTransferredOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereIsTransferredOutDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereLrn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereMothertongue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereMovingUpStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment wherePurok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereReligion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereSchoolYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereUpdatedAt($value)
 */
	class Enrollment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Grade0
 *
 * @method static \Database\Factories\Grade0Factory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Grade0 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade0 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade0 query()
 */
	class Grade0 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Grade1
 *
 * @method static \Database\Factories\Grade1Factory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Grade1 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade1 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade1 query()
 */
	class Grade1 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Grade2
 *
 * @method static \Database\Factories\Grade2Factory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Grade2 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade2 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade2 query()
 */
	class Grade2 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Grade3
 *
 * @method static \Database\Factories\Grade3Factory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Grade3 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade3 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade3 query()
 */
	class Grade3 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Grade4
 *
 * @method static \Database\Factories\Grade4Factory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Grade4 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade4 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade4 query()
 */
	class Grade4 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Grade5
 *
 * @method static \Database\Factories\Grade5Factory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Grade5 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade5 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade5 query()
 */
	class Grade5 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Grade6
 *
 * @method static \Database\Factories\Grade6Factory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Grade6 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade6 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade6 query()
 */
	class Grade6 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GradeLevel
 *
 * @property int $id
 * @property string|null $gradeLevelName
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\GradeLevelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel whereGradeLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel whereUpdatedAt($value)
 */
	class GradeLevel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Inventory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory query()
 */
	class Inventory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kinder
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Kinder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kinder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kinder query()
 */
	class Kinder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LearningModality
 *
 * @property int $id
 * @property string $mode_name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\LearningModalityFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|LearningModality newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LearningModality newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LearningModality query()
 * @method static \Illuminate\Database\Eloquent\Builder|LearningModality whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LearningModality whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LearningModality whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LearningModality whereModeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LearningModality whereUpdatedAt($value)
 */
	class LearningModality extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Library
 *
 * @method static \Database\Factories\LibraryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Library newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Library newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Library query()
 */
	class Library extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mailbox
 *
 * @property int $id
 * @property int $sender_id
 * @property int $receiver_id
 * @property string $subject
 * @property string $message
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Mailbox newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mailbox newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mailbox query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mailbox whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mailbox whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mailbox whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mailbox whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mailbox whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mailbox whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mailbox whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mailbox whereUpdatedAt($value)
 */
	class Mailbox extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MessageSender
 *
 * @property int $id
 * @property int $sender_id
 * @property int $receiver_ids
 * @property int $subject
 * @property int $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MessageSender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageSender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageSender query()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageSender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageSender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageSender whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageSender whereReceiverIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageSender whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageSender whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageSender whereUpdatedAt($value)
 */
	class MessageSender extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ParentGuardian
 *
 * @property int $id
 * @property int $adminId
 * @property int $teacherId
 * @property int $studentId
 * @property string|null $fathersFirstName
 * @property string|null $fathersMiddleName
 * @property string|null $fathersLastName
 * @property string|null $fathersSuffix
 * @property string|null $mothersFirstName
 * @property string|null $mothersMiddleName
 * @property string|null $mothersLastName
 * @property string|null $mothersSuffix
 * @property string|null $guardiansFirstName
 * @property string|null $guardiansMiddleName
 * @property string|null $guardiansLastName
 * @property string|null $guardiansSuffix
 * @property string|null $relationshiptoStudent
 * @property string|null $contactNumber
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian query()
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereFathersFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereFathersLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereFathersMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereFathersSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereGuardiansFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereGuardiansLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereGuardiansMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereGuardiansSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereMothersFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereMothersLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereMothersMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereMothersSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereRelationshiptoStudent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParentGuardian whereUpdatedAt($value)
 */
	class ParentGuardian extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\QuarterlyGrading
 *
 * @property int $id
 * @property string $quarter_name
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlyGrading newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlyGrading newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlyGrading query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlyGrading whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlyGrading whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlyGrading whereQuarterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlyGrading whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlyGrading whereUpdatedAt($value)
 */
	class QuarterlyGrading extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\QuarterlySummaryGrade
 *
 * @property int $id
 * @property string|null $school_year
 * @property int|null $admin_id
 * @property int|null $subject_id
 * @property int|null $teacher_id
 * @property int|null $student_id
 * @property int|null $section_id
 * @property int|null $grade_level_id
 * @property int|null $quarter_1
 * @property int|null $quarter_2
 * @property int|null $quarter_3
 * @property int|null $quarter_4
 * @property float|null $final_grade
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereFinalGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereGradeLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereQuarter1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereQuarter2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereQuarter3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereQuarter4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereSchoolYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuarterlySummaryGrade whereUpdatedAt($value)
 */
	class QuarterlySummaryGrade extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\School
 *
 * @property int $id
 * @property int|null $adminId
 * @property int|null $schoolId
 * @property string|null $schoolName
 * @property string|null $schoolRegion
 * @property string|null $schoolDivision
 * @property string|null $schoolYear
 * @property string|null $schoolDistrict
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|School newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|School newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|School query()
 * @method static \Illuminate\Database\Eloquent\Builder|School whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSchoolDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSchoolDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSchoolName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSchoolRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSchoolYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereUpdatedAt($value)
 */
	class School extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SchoolForm1
 *
 * @property int $id
 * @property string|null $school_year
 * @property int|null $teacher_id
 * @property int|null $student_id
 * @property string|null $student_lrn
 * @property string|null $student_complete_name
 * @property string|null $student_gender
 * @property string|null $student_birthdate
 * @property int|null $student_age
 * @property string|null $student_mother_tounge
 * @property string|null $student_ip
 * @property string|null $student_religion
 * @property string|null $student_purok
 * @property string|null $student_brngy
 * @property string|null $student_city
 * @property string|null $student_province
 * @property string|null $student_father_completename
 * @property string|null $student_mother_completename
 * @property string|null $student_guardian_completename
 * @property string|null $student_guardian_relationship
 * @property string|null $student_parent_guardian_contactnumber
 * @property string|null $student_learning_modality
 * @property string|null $student_remarks
 * @property int|null $total_male
 * @property int|null $total_female
 * @property int|null $total_all
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereSchoolYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentBrngy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentCompleteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentFatherCompletename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentGuardianCompletename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentGuardianRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentLearningModality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentLrn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentMotherCompletename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentMotherTounge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentParentGuardianContactnumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentPurok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentReligion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereStudentRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereTotalAll($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereTotalFemale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereTotalMale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm1 whereUpdatedAt($value)
 */
	class SchoolForm1 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SchoolForm2
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $student_id
 * @property int $section_id
 * @property string $month
 * @property string $date
 * @property int $female_total_perday
 * @property int $male_total_perday
 * @property int $combined_total_perday
 * @property int $total_num_class_permonth
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereCombinedTotalPerday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereFemaleTotalPerday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereMaleTotalPerday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereTotalNumClassPermonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolForm2 whereUpdatedAt($value)
 */
	class SchoolForm2 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Section
 *
 * @property int $id
 * @property int $adminId
 * @property string $sectionName
 * @property int $gradeLevelId
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SectionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereGradeLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereSectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereUpdatedAt($value)
 */
	class Section extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Session
 *
 * @property int $id
 * @property int $adminId
 * @property string $school_year
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SessionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereSchoolYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUpdatedAt($value)
 */
	class Session extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Student
 *
 * @property int $id
 * @property int $adminId
 * @property int $teacherId
 * @property int $studentId
 * @property string $school_year
 * @property int $lrn
 * @property int $sectionId
 * @property int $gradeLevelId
 * @property string|null $mothertongue
 * @property string|null $ethnicgroup
 * @property string|null $religion
 * @property string|null $learning_modality
 * @property string|null $remarks
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereEthnicgroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereGradeLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereLearningModality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereLrn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereMothertongue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereReligion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSchoolYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
 */
	class Student extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StudentAssessmentScore
 *
 * @property int $id
 * @property string|null $sy
 * @property int|null $admin_id
 * @property int|null $teacher_id
 * @property int|null $student_id
 * @property int|null $section_id
 * @property int|null $subject_id
 * @property int|null $quarter_id
 * @property string|null $written_student_score
 * @property string|null $written_possible_score
 * @property int|null $written_total_possible_score
 * @property int|null $written_total_student_score
 * @property int|null $written_student_percentage_score
 * @property int|null $written_student_weighted_average
 * @property string|null $performance_student_score
 * @property string|null $performance_possible_score
 * @property int|null $performance_total_student_score
 * @property int|null $performance_total_possible_score
 * @property int|null $performance_student_percentage_score
 * @property int|null $performance_student_weighted_average
 * @property string|null $quarterly_assessment_student_score
 * @property string|null $quarterly_assessment_possible_score
 * @property int|null $quarterly_total_assessment_student_score
 * @property int|null $quarterly_total_assessment_possible_score
 * @property int|null $quarterly_assessment_student_percentage_score
 * @property int|null $quarterly_assessment_student_weighted_average
 * @property float|null $initial_grade
 * @property int|null $quarterly_grade
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereInitialGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore wherePerformancePossibleScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore wherePerformanceStudentPercentageScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore wherePerformanceStudentScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore wherePerformanceStudentWeightedAverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore wherePerformanceTotalPossibleScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore wherePerformanceTotalStudentScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereQuarterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereQuarterlyAssessmentPossibleScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereQuarterlyAssessmentStudentPercentageScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereQuarterlyAssessmentStudentScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereQuarterlyAssessmentStudentWeightedAverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereQuarterlyGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereQuarterlyTotalAssessmentPossibleScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereQuarterlyTotalAssessmentStudentScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereSy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereWrittenPossibleScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereWrittenStudentPercentageScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereWrittenStudentScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereWrittenStudentWeightedAverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereWrittenTotalPossibleScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAssessmentScore whereWrittenTotalStudentScore($value)
 */
	class StudentAssessmentScore extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StudentReportGrade
 *
 * @property int $id
 * @property int|null $admin_id
 * @property string|null $school_year
 * @property int|null $teacher_id
 * @property int|null $student_id
 * @property int|null $section_id
 * @property string|null $grade_level_id
 * @property string|null $lrn
 * @property string|null $quarter_1
 * @property string|null $quarter_2
 * @property string|null $quarter_3
 * @property string|null $quarter_4
 * @property string|null $unit
 * @property string|null $final_rating
 * @property string|null $general_average
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereFinalRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereGeneralAverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereGradeLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereLrn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereQuarter1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereQuarter2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereQuarter3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereQuarter4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereSchoolYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentReportGrade whereUpdatedAt($value)
 */
	class StudentReportGrade extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subject
 *
 * @property int $id
 * @property int $adminId
 * @property int $gradeLevelId
 * @property string $subjectName
 * @property string|null $description
 * @property int|null $written_work_percentage
 * @property int|null $performance_tasks_percentage
 * @property int|null $quarterly_assessment_percentage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereGradeLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject wherePerformanceTasksPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereQuarterlyAssessmentPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereSubjectName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereWrittenWorkPercentage($value)
 */
	class Subject extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Teacher
 *
 * @property int $id
 * @property int $adminId
 * @property int $teacherId
 * @property int $sectionId
 * @property int $gradeLevelId
 * @property int $addressId
 * @property string $school_year
 * @property string $designation
 * @property int $employeeNumber
 * @property string $position
 * @property string $fundSource
 * @property string $degree
 * @property string $major
 * @property string|null $minor
 * @property int $totalTeachingTimePerWeek
 * @property int $numberOfAncillary
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TeacherFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereEmployeeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereFundSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereGradeLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereMajor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereMinor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereNumberOfAncillary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereSchoolYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereTotalTeachingTimePerWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereUpdatedAt($value)
 */
	class Teacher extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property int $role
 * @property string|null $middlename
 * @property string|null $lastname
 * @property string|null $suffix
 * @property string|null $gender
 * @property string|null $birthdate
 * @property int|null $age
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $image
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMiddlename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

