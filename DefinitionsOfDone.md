# Objects needed

a Class contains to a School

a Schoolhave n Teacher

a School have n Students

a School have n Leader who can have access to all the Schools related objects / elements / functions, they are something like local admins

a Class have one Teacher and n Students

a Class have Exams

an Exam can be oral or written

an Exam is related to n Students of the Class

Each related Student can have a Mark to an Exam

Each Class have n Notices to the related Students

Each of the Notice is related to one Student or to all of them

a Teacher will have n potential Substituts (Verttetungen)

a School will have n SchoolYearGroups (dependent to their school model like Gynasium, Realschule, etc ... but this is only a config element of the local admins)

A SchoolYearGroup have n Classes

A SchoolYearGroup have n Students

A School have a Calendar

A School have n Events

A SchoolYearGroup have n Events

A Class have n Events

Each Event can be from a different type

Each Event can have ForcedParticipants

Each Event have Participants


