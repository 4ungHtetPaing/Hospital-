<?php include 'include/header.php';?>
  <!-- Navigation-->
  <?php include 'include/sidebar.php';?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active col-11">View Blog 
          <a class="btn btn-outline-secondary float-right" href="view_blog.php">view Post</a>
          <a class="float-right btn btn-outline-secondary mr-3" href="blog.php"> Add Blog Post</a>
        </li>
      </ol>
      <div class="container-fluid">
          <div class="row">
             <div class="col-md-4 offset-md-4">
                <form method="post" action="../server/blog_category_management.php" enctype="multipart/form-data">
                  <div class="form-group">
                     <label for="Name">Blog Category</label>
                     <input type="text" class="form-control" id="Name" placeholder="write category name" name="Category_Name">
                   </div>
                   <button type="submit" class="btn btn-outline-secondary btn-block mt-5" name='Submit' value="Insert">Submit</button>
                </form>   
             </div>
          </div>
      </div>
      <div class="container-fluid mt-5">
        <div class="row">
          <div class="col-md-6 offset-md-3">
              <?php 
                require_once("../server/Model/blog_category_management_model.php");
                $blog_category=blog_category::All();

                $i=1;
                
                
              ?>
              <table class="table">
                  <thead>
                   
                        <td>#</td>
                        <td>Category</td>
                        <td>Edit</td>
                        <td>Delete</td>
                     
                  </thead>
                  <tbody>
                    <?php 
                          while ($row=mysqli_fetch_object($blog_category)) {
                     ?>
                    <tr>
                        <td><?=$i ?></td>
                        <td><?=$row->category_name ?></td>
                        <td>
                           <i class="fas fa-edit" onclick="Edit(this,<?=$row->id ?>)"></i>
                        </td>
                        <td>
                          <i class="fas fa-trash" onclick="Del(this,<?=$row->id ?>)"></i>
                        </td>
                    </tr>

                    <?php 
                         $i++;
                      }
                     
                     ?>
                  </tbody>
              </table>
          </div>
      </div>
    </div>
<?php include 'include/footer.php';?> 
<script>
  localStorage.clear();

  /*var form=document.querySelector('form');
  form.onsubmit=function(e){
    e.preventDefault() ;

    var data=new FormData(this);
    data.append('Submit','Insert');
    var xhttp=new XMLHttpRequest;
     xhttp.onreadystatechange=function(){
      if(this.readyState==4 && this.status==200){
        alert(this.responseText);
        
      }
      
    }
     xhttp.open("POST","../server/blog_category_management.php",true);
       xhttp.send(data);
  }*/

  function Del(el,id){
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
      if(this.readyState==4 && this.status==200){
        alert(this.responseText);
        el.parentElement.parentElement.remove();
      }
    }
    xhttp.open("GET","../server/blog_category_management.php?Del_id="+id,true);
    xhttp.send();
  }

  function Edit(el,id){
    try {
        document.querySelector('.fa-times').click();
    }
    catch(err){
        //console.log(err);
    }
    
      var category_name=el.parentElement.parentElement.children[1].innerHTML;
      localStorage.setItem('category_name',category_name);
      localStorage.setItem('id',id);
       el.parentElement.parentElement.children[1].innerHTML="<input type='text' value="+category_name+">";
       el.parentElement.parentElement.children[3].innerHTML="<i class='fas fa-times' onclick='Close(this)'></i>";
       el.parentElement.parentElement.children[2].innerHTML="<i class='fas fa-check' onclick='Update(this)'></i>";

      
  }

  function Close(el){
       el.parentElement.parentElement.children[1].innerHTML=localStorage.category_name;
       el.parentElement.parentElement.children[2].innerHTML="<i class='fas fa-edit' onclick='Edit(this,"+localStorage.id+")'></i>";
       el.parentElement.parentElement.children[3].innerHTML="<i class='fas fa-trash' onclick='Del(this,"+localStorage.id+")'></i>";

       localStorage.clear();
  }

  function Update(el){
    var category_name=el.parentElement.parentElement.children[1].children[0].value;
    category_name=(category_name!="")?category_name:localStorage.category_name;
    var data=new FormData();
    data.append("Update","Cat_Update");
    data.append("Id",localStorage.id);
    data.append("Category_Name",category_name);
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            alert(this.responseText);
             el.parentElement.parentElement.children[1].innerHTML=category_name;
             el.parentElement.parentElement.children[3].innerHTML="<i class='fas fa-trash' onclick='Del(this,"+localStorage.id+")'></i>";
             el.parentElement.parentElement.children[2].innerHTML="<i class='fas fa-edit' onclick='Edit(this,"+localStorage.id+")'></i>";
         }
    }

    xhttp.open("POST","../server/blog_category_management.php",true);
    xhttp.send(data);


  }

</script>