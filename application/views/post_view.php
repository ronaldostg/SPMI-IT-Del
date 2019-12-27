<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Codeigniter 3 Ajax Pagination using Jquery Example - ItSolutionStuff.com</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style type="text/css">
      html, body { font-family: 'Raleway', sans-serif; }
      a{ color: #007bff; font-weight: bold;}
    </style>
  </head> 
  <body>
      
   <div class="container">
    <div class="card">
      <div class="card-header">
        Codeigniter Ajax Pagination Example - ItSolutionStuff.com
      </div>
      <div class="card-body">
           <!-- Posts List -->
           <table class="table table-borderd" id='postsList'>
             <thead>
              <tr>
                <th>S.no</th>
                <th>Title</th>
              </tr>
             </thead>
             <tbody></tbody>
           </table>
           
           <!-- Paginate -->
           <div id='pagination'></div>
      </div>
    </div>
   </div>
 
   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script type='text/javascript'>
   $(document).ready(function(){
 
     $('#pagination').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       loadPagination(pageno);
     });
 
     loadPagination(1);
 
     function loadPagination(pagno){
       $.ajax({
         url: 'PA2/matkul/loadRecord/'+pagno,
         type: 'get',
         dataType: 'json',
         success: function(response){
            $('#pagination').html(response.pagination);
            createTable(response.result,response.row);
         }
       });
     }
 
     function createTable(result,sno){
       sno = Number(sno);
       $('#postsList tbody').empty();
       for(index in result){
          var id = result[index].id_matkul;
          var title = result[index].kode_matkul;
          var content = result[index].nama_matku;;
          content = content.substr(0, 60) + " ...";
          var link = result[index].nama_matkul;
          sno+=1;
 
          var tr = "<tr>";
          tr += "<td>"+ sno +"</td>";
          tr += "<td><a href='"+ link +"' target='_blank' >"+ title +"</a></td>";
          tr += "</tr>";
          $('#postsList tbody').append(tr);
  
        }
      }
       
    });
    </script>
  </body>
</html>