<x-guest-layout>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
<body>
<h2>List of courses</h2>

<form method="POST" action="/viewRegCourse">
  @csrf  
  <table>
    <tr>
      <th>Course Code</th>
      <th>Course Title</th>
      <th>Unit</th>
      <th>action</th>
    </tr>
    
      @foreach($courses as $course)
      <tr>
      <td>{{$course->course_code}}</td>
      <td>{{$course->course_title}}</td>
      <td>{{$course->course_unit}}</td>
      <td>    
          <input type="checkbox" name="{{$course->id}}" value="no" id="myCheck" onclick="actionReg({{$course->id}})">
      </td>
      </tr> 
      @endforeach    
  </table>

<button type="submit"  class="btn btn-secondary btn-lg">Register</button>
</form>

<script>
const courseList = [];

function actionReg(courseId) {
  const courseIdIndex = courseList.findIndex(id => id === courseId);
  console.log("CourseIndex:", courseIdIndex);
  if (courseIdIndex !== -1) {
    // remove id
    courseList.splice(courseIdIndex);
   }
  else{
      
  courseList.push(courseId);
    
  }
  console.log(courseList);
  } 
  
  // console.log(fetch('/courses'));
  fetch('http://127.0.0.1:8000/viewRegCourse', {
    method: 'POST',
    header: {'Content-Type': 'application.json'},
    body: {courseList}
  })
    .then(res => { 
      return res.json()
    })
    .then(data =>console.log(data))
    .catch(error => console.log('error is here'))
  /* var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    // console.log($course->id)
    console.log('hello')
    text.style.display = "block";
  } else {
    console.log('No hello')

     text.style.display = "none";
  } */

/* const post = {
    method : 'POST',
    headers: {
        'Content-type': 'application/json; charset=UTF-8'
    },
    body: JSON.stringify(numbers)
}
fetch('/viewRegCourse', putMethod)
    .then(res => res.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);

    })*/

</script>

</body>
</html>
</x-guest-layout>

