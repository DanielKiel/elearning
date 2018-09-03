<?php

use Illuminate\Database\Seeder;

class DefaultElearningRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creating roles first
        $headTeacherRole = \Spatie\Permission\Models\Role::create(['name' => 'HeadTeacher']);

        $teacherRole = \Spatie\Permission\Models\Role::create(['name' => 'Teacher']);

        $studentRole = \Spatie\Permission\Models\Role::create(['name' => 'Student']);

        //now creating permissions
        //class object
        $creatingClassesPerm = \Spatie\Permission\Models\Permission::create(['name' => 'CreateClass']);
        $updateClassesPerm = \Spatie\Permission\Models\Permission::create(['name' => 'UpdateClass']);
        $deletingClassesPerm = \Spatie\Permission\Models\Permission::create(['name' => 'DeleteClass']);
        $readingClassesPerm = \Spatie\Permission\Models\Permission::create(['name' => 'ReadClass']);

        //schoolYear object
        $creatingSchoolYearPerm = \Spatie\Permission\Models\Permission::create(['name' => 'CreateSchoolYear']);
        $updateSchoolYearPerm = \Spatie\Permission\Models\Permission::create(['name' => 'UpdateSchoolYear']);
        $deletingSchoolYearPerm = \Spatie\Permission\Models\Permission::create(['name' => 'DeleteSchoolYear']);
        $readingSchoolYearPerm = \Spatie\Permission\Models\Permission::create(['name' => 'ReadSchoolYear']);

        //calendar object
        $creatingCalendarPerm = \Spatie\Permission\Models\Permission::create(['name' => 'CreateCalendar']);
        $updateCalendarPerm = \Spatie\Permission\Models\Permission::create(['name' => 'UpdateCalendar']);
        $deletingCalendarPerm = \Spatie\Permission\Models\Permission::create(['name' => 'DeleteCalendar']);
        $readingCalendarPerm = \Spatie\Permission\Models\Permission::create(['name' => 'ReadCalendar']);
        
        //exam object of type written
        $creatingWrittenExamPerm = \Spatie\Permission\Models\Permission::create(['name' => 'CreateWrittenExam']);
        $updateWrittenExamPerm = \Spatie\Permission\Models\Permission::create(['name' => 'UpdateWrittenExam']);
        $deletingWrittenExamPerm = \Spatie\Permission\Models\Permission::create(['name' => 'DeleteWrittenExam']);
        $readingWrittenExamPerm = \Spatie\Permission\Models\Permission::create(['name' => 'ReadWrittenExam']);
        
        //exam object of type oral
        $creatingOralExamPerm = \Spatie\Permission\Models\Permission::create(['name' => 'CreateOralExam']);
        $updateOralExamPerm = \Spatie\Permission\Models\Permission::create(['name' => 'UpdateOralExam']);
        $deletingOralExamPerm = \Spatie\Permission\Models\Permission::create(['name' => 'DeleteOralExam']);
        $readingOralExamPerm = \Spatie\Permission\Models\Permission::create(['name' => 'ReadOralExam']);

        //event object
        $creatingEventPerm = \Spatie\Permission\Models\Permission::create(['name' => 'CreateEvent']);
        $updateEventPerm = \Spatie\Permission\Models\Permission::create(['name' => 'UpdateEvent']);
        $deletingEventPerm = \Spatie\Permission\Models\Permission::create(['name' => 'DeleteEvent']);
        $readingEventPerm = \Spatie\Permission\Models\Permission::create(['name' => 'ReadEvent']);


        //... some more objects here


        //assign the permissions for the headTeacher
        $headTeacherRole->syncPermissions([
            //class perms
            $creatingClassesPerm, $updateClassesPerm, $deletingClassesPerm, $readingClassesPerm,
            //schoolyear perms
            $creatingSchoolYearPerm, $updateSchoolYearPerm, $deletingSchoolYearPerm, $readingSchoolYearPerm,
            //calendar perms
            $creatingCalendarPerm, $updateCalendarPerm, $deletingCalendarPerm, $readingCalendarPerm,
            //event perms
            $creatingEventPerm, $updateEventPerm, $deletingEventPerm, $readingEventPerm,
            //written exam perms
            $creatingWrittenExamPerm, $updateWrittenExamPerm, $deletingWrittenExamPerm, $readingWrittenExamPerm,
            //oral exam perms
            $creatingOralExamPerm, $updateOralExamPerm, $deletingOralExamPerm, $readingOralExamPerm
        ]);

        //assign the permissions for the teacher
        $teacherRole->syncPermissions([
            //class perms
            $readingClassesPerm,
            //schoolyear perms
            $readingSchoolYearPerm,
            //calendar perms
            $readingCalendarPerm,
            //event perms
            $creatingEventPerm, $updateEventPerm, $deletingEventPerm, $readingEventPerm,
            //written exam perms
            $creatingWrittenExamPerm, $updateWrittenExamPerm, $deletingWrittenExamPerm, $readingWrittenExamPerm,
            //oral exam perms
            $creatingOralExamPerm, $updateOralExamPerm, $deletingOralExamPerm, $readingOralExamPerm
        ]);

        //assign the permissions for the students
        $studentRole->syncPermissions([
            $readingClassesPerm,
            //schoolyear perms
            $readingSchoolYearPerm,
            //calendar perms
            $readingCalendarPerm,
            //event perms
            $creatingEventPerm, $updateEventPerm, $deletingEventPerm, $readingEventPerm,
            //written exam perms // a student can create one cause it can be a "unangekuendigte kontrolle"
            $creatingWrittenExamPerm, $updateWrittenExamPerm, $readingWrittenExamPerm,
            //oral exam perms // a student can create one cause it can be a "unangekuendigte kontrolle"
            $creatingOralExamPerm, $updateOralExamPerm, $readingOralExamPerm
        ]);
    }
}
