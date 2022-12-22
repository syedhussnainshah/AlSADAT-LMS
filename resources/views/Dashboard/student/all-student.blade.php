<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@include("Dashboard.component.navbar")
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Father Name</th>
                        <th>Number</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student as $stud)
                    <tr>
                        <td>{{$stud->StudentName}}</td>
                        <td>{{$stud->GradianName}}</td>
                        <td>{{$stud->StudentWhatsappNumber}}</td>
                        <td>{{$stud->StudentClass}}</td>
                        <td>
                        
                            <form action="{{url('Student-Update-Form')}}" method="POST">
                                @csrf
                                <input type="hidden" name="student_id" value="{{$stud->student_id}}">
                                <button type="submit"  class="btn btn-info">Edit</button>
                            </form>


                            <button class="btn btn-danger m-1">Del</button><button class="btn btn-primary m-1">View</button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@include("Dashboard.component.footer")
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
</script>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>