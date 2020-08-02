Laravel Relations

ManyToMany
//post - may have many tags
//tags - may have many posts
//pivot table

HasOneThrough/HasManyThrough
project:

User:
    project_id
Task:
    user_id

$project->task
for this we have no colum btw project and task wo we use hasmanythrough

OneToOne/OneToMany
Post:

Video:

Podcast:

Event:

Comment:
    commentable_id: 1
    commentable_type: Post
