# Kanban Board

# Design / Architecture
As instructed, this aplication has been developed using Vue, PHP and Laraval. Here is the deployment architecture diagram.

![alt text](https://github.com/NavpreetRajput/kanban/blob/master/Arch.jpg)

# Tech-Stack Used to build application:
1. Application deployed on EC2 instances running Ubuntu 20.04 LTS
2. Apache Server
3. MySQL Database
4. Vue.js and Vue CLI
5. PHP
6. Laraval
7. Postman (Used for API Testing)
8. npm
9. Amazon EC2
10. git 
11. Axios for HTTP requests
12. HTML/CSS 

**Note** 
Vue.js is not my primary skillset. The Vue.js used in this project is what I learned and applied in two days. 
This is to show my enthusiasm to learn and adapt to new technologies. 

# Database
For the sake of brevity, I have kept the database design simple. There is one table with one row to save the entire board. 

Here is database table with colum data types
![alt text](https://github.com/NavpreetRajput/kanban/blob/master/database_table.png)

Here is how the data in the table looks like:
![alt text](https://github.com/NavpreetRajput/kanban/blob/master/database1.png)

# Data Structures
Vue.js frontend communicates with backend using the below json data structure:

Here columns are represented as top level array which contain column objects. Column objects has name and id properties along with list of cards.

```json
[
    { 
        "name": "ToDo",
        "id":1,
        "cards": [
            { "title": "Task 1", "description": "task 1 description","id": 1 },
            { "title": "Task 2", "description": "task 2 description","id": 2 }
        ]
    },
    {
        "name": "InProgress",
        "id":2,
        "cards": [
            { "title": "Task 3", "description": "task 3 description","id": 3 },
            { "title": "Task 4", "description": "task 4 description","id": 4 }
        ]
    },
    {
        "name": "Done",
        "id":3,
        "cards": [
            { "title": "Task 5", "description": "task 5 description","id": 5 },
            { "title": "Task 6", "description": "task 6 description","id": 6 }
        ]
    }
]
```

# Styling
Although SCSS with BEM were recommended for styling, the requirement section mentioned **"The UI needs to be simple but user friendly. As long as it is intuitive
and similar to the sketches, we will allow for freedom in it."**. I have used bootstrap with basic styling, but UI is intuitive and user friendly.

# Considerations / Assumptions:
1. Authentication/authorization was not implemented as it was considered out of scope for this excercise.	
2. CORS has been disabled for the backend, so that I could use two free tier EC2 instances to run the application. Application performance was not so good with everything running on one instance.
3. Application is single user.

# How to run this application
Application is running on following url (deployed on Amazon ec2 instance. I will keep it running for next two weeks): 

http://13.211.94.117/
