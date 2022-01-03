
<head>
  <title>HomePage</title>
</head>
<?php 
  include("./masterMain.php");
 ?>
 <body >

  <nav class="navbar navbar-dark bg-dark Edit_navbar_Main">
      
      <div class="container Edit_container">
      <nav class="navbar navbar-expand-lg navbar-light bg-dark Edit_navbar">
        <div class="container-fluid">
          <a class="navbar-brand" style="font-weight: bold;" href="#">Online Voting System</a>
        
        </div>
      </nav>
        <button type="button" id="LogoutID" class="btn btn-outline-light edit_Btn"><i style="margin-right: 5px;" class="fa fa-sign-out" aria-hidden="true"></i>Logout</button>
    </div>

  </nav>

  <?php
  include('../Config/helper_class.php');
  $Obj=new helper_class();

  $Email=$_SESSION['Email'];
  $EmailCheckData=[ 'table'=>'profiles',
               'Column'=>'Email',
                'data'=> $Email
          ];
  $run=$Obj->uniqueData($EmailCheckData);
  while ($data=mysqli_fetch_assoc($run)) {
   ?>
<div class="container Homepage_Container1">
  <div class="row row-cols-0 ">
    <div class="col Homepage_Login">
      <div class="text-center ProfileCard">
        <img src="../Css/Image/Profile.jpg" class="rounded" alt="...">
    </div>
      <!-- Profile -->
      <table class="table table-dark">
       
        <tbody>
          <tr>
            <th scope="row">Full Name</th>
            <td colspan="2" class="table-active"><?php echo $data['Name'] ?></td>
          </tr>
          <tr>
            <th scope="row">Email</th>
            <td colspan="2" class="table-active"><?php echo $data['Email'] ?></td>
          </tr>
          <tr>
            <th scope="row">Date Of Birth</th>
            <td colspan="2" class="table-active"><?php echo $data['DATEofBIRTH'] ?></td>
          </tr>
          <tr>
            <th scope="row">State</th>
            <td colspan="2" class="table-active"><?php echo $data['State'] ?></td>
          </tr>
          <tr>
            <th scope="row">City</th>
            <td colspan="2" class="table-active"><?php echo $data['City'] ?></td>
          </tr>
          <tr>
            <th scope="row">Address</th>
            <td colspan="2" class="table-active"><?php echo $data['Address'] ?></td>
          </tr>
          <tr>
            <th scope="row">Status</th>
            <td colspan="2" class="table-active"><?php echo $data['VoteStatus'] ?></td>
          </tr>
        </tbody>
      </table>
      <div class="text-center" >
        <!-- <button type="button" class="btn btn-outline-dark">Update</button> -->
      </div>
    </div>
    <!-- Vote -->
     <div class="col  Homepage_Vote HomepageVote111">
     <form action="../Action/voteAction.php" method="post">
      <div class="card">
        <div class="card-body">
          PHP
        </div>
        <div class="MainBtn">
          <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
          <input type="hidden" name="Email" value="<?php echo $data['Email'] ?>">
          <input type="hidden" name="Vote" value="PHP">
      <button type="submit" class="btn btn-dark phpbtn">Vote</button>
        </div>
      </div>
     </form>
      <form action="../Action/voteAction.php" method="post">
      <div class="card">
        <div class="card-body">
          JAVA
        </div>
        <div class="MainBtn">
           <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
          <input type="hidden" name="Email" value="<?php echo $data['Email'] ?>">
          <input type="hidden" name="Vote" value="Java">
      <button type="submit" value="JAVA" class="btn btn-dark JAVAbtn">Vote</button>
        </div>
      </div>
    </form>
      <form action="../Action/voteAction.php" method="post">
      <div class="card">
        <div class="card-body">
          Ruby
        </div>
        <div class="MainBtn">
           <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
          <input type="hidden" name="Email" value="<?php echo $data['Email'] ?>">
          <input type="hidden" name="Vote" value="Ruby">
      <button type="submit" class="btn btn-dark Rubybtn">Vote</button>
        </div>
      </div>
    </form>
      <form action="../Action/voteAction.php" method="post">
      <div class="card">
        <div class="card-body">
          .Net
        </div>
        <div class="MainBtn">
           <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
          <input type="hidden" name="Email" value="<?php echo $data['Email'] ?>">
          <input type="hidden" name="Vote" value="DotNet">
      <button type="submit" class="btn btn-dark netbtn">Vote</button>
        </div>
      </div>
    </form>
      <form action="../Action/voteAction.php" method="post">
      <div class="card">
        <div class="card-body">
          Python
        </div>
        <div class="MainBtn">
           <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
          <input type="hidden" name="Email" value="<?php echo $data['Email'] ?>">
          <input type="hidden" name="Vote" value="Python">
      <button type="submit" class="btn btn-dark pythonbtn">Vote</button>
        </div>
      </div>
    </form>
      <form action="../Action/voteAction.php" method="post">
      <div class="card">
        <div class="card-body">
          node Js
        </div>
        <div class="MainBtn">
           <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
          <input type="hidden" name="Email" value="<?php echo $data['Email'] ?>">
          <input type="hidden" name="Vote" value="NodeJS">
      <button type="submit" class="btn btn-dark nodeJsnbtn">Vote</button>
        </div>
      </div>
    </form>
    
    </div>
    <nav class="bg-dark errorValidation" id="errorValidationID">
       <?php 
        if (isset($_COOKIE['Allready_Voted'])) {
            echo $_COOKIE['Allready_Voted'];
        }
        if (isset($_COOKIE['Vote'])) {
            echo $_COOKIE['Vote'];
        }
        ?>
      </nav>
  </div>
</div>

<?php
  };
  ?>
<script type="text/javascript" src="../js/main.js"></script>