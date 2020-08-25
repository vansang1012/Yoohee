<style>#cms-table table.table{	width:100%;	border-collapse:collapse;}#cms-table table.table th{		text-align:center;	}#cms-table table.table th.last{	border-right:none;}#cms-table table.table td{	padding:0px;	font-size:11px;	border:1px solid #CCC;	background:#FFF;	white-space:nowrap;	height:82px;	position:relative;}#cms-table table.table tr td.prev,#cms-table table.table tr td.next{	background:#E8EEF7;}#cms-table table.table tr td.current{	background:#FEFD9F;}#cms-table table.table tr td.current span.date{	color:red;	text-decoration:underline;	font-weight:bold;}#cms-table table.table tr td.last{	border-right:none;}#cms-table table.table tr td.first{	border-left:none;}#cms-table table.table tr td.first span.date,#cms-table table.table tr td.last span.date{	color:red;}#cms-table table.table tr.last td{	border-bottom:none;}#cms-table table.table td span.date{	position:absolute;	left:10px;	top:10px;}#cms-table table.table tr td:hover .dialog{	display:block;}#cms-table table.table tr td .dialog{	display:block;	position:absolute;	left:-5px;	top:-10px;	z-index:999;	width:468px;	height:200px;	background:#FDFCBB;	border:1px solid #ccc;	box-shadow:0 2px 4px rgba(0,0,0,.2);	-moz-box-shadow:0 2px 4px rgba(0,0,0,.2);	-webkit-box-shadow:0 2px 4px rgba(0,0,0,.2);}#cms-table table.table tr td .dialog .date{	text-align:left;	padding:5px 0px 5px 10px;	font-weight:bold;	font-size:11px;	color:#333;	background:#E8EEF7;	margin:0px;}</style><div id="cms-tab">	<p class="title">Hệ thống quản trị dữ liệu</p>	<div class="cms-clear"></div></div><!-- #cms-tab --><div id="cms-container">	<div id="cms-table" style="margin:0px;">		<?php		if(!function_exists('total_day_of_month')){			function total_day_of_month($month = NULL, $year = NULL){				if($month == 2){					if($year % 4 == 0) return 29;					else return 28;				}				if(in_array($month, array(1,3,5,7,8,10,12))) return 31;				if(in_array($month, array(4,6,9,11))) return 30;			}		}		if(!function_exists('no_of_month')){			function no_of_month($day = NULL, $month = NULL, $year = NULL){				return gmdate('N', strtotime($day.'-'.$month.'-'.$year) + 7*3600);			}		}		if(!function_exists('position_cell')){			function position_cell($cell){				$cell = $cell + 1;				$row = ceil($cell/7);				$col = ceil($cell%7); $col = ($col == 0)?7:$col;				return array('row' => $row, 'col' => $col);			}		}		// Ngày hiện tại		$day = gmdate('d', time() + 7*3600);		$month = gmdate('m', time() + 7*3600);		$year = gmdate('Y', time() + 7*3600);		$time = strtotime($year.'-'.$month.'-'.$day);		$total = total_day_of_month($month, $year);		$start = no_of_month(1, $month, $year);				// Tháng trước		$month_prev = date('m', strtotime('-1 month', $time));		$year_prev = date('Y', strtotime('-1 month', $time));		$total_prev = total_day_of_month($month_prev, $year_prev);				// Tháng sau		$month_next = date('m', strtotime('+1 month', $time));		$year_next = date('Y', strtotime('+1 month', $time));				// Những ngày cuối cùng của tháng trước được gán vào tháng hiện tại		$arr_prev = NULL;		for($i = ($total_prev - $start + 1); $i <= $total_prev; $i++){			$arr_prev[] = $i;		}		?>		<table cellspacing="0" cellpadding="0" class="table">			<tr>				<th><span class="date">Chủ nhật</span></th>				<th>Thứ hai</th>				<th>Thứ ba</th>				<th>Thứ tư</th>				<th>Thứ năm</th>				<th>Thứ sáu</th>				<th class="last">Thứ bảy</th>			</tr>			<?php			$cell = 0; // Số ô			$current_day = ''; $sunday = ''; $saturday = ''; // Hiện tại + Chủ nhật + Thứ bảy			$first = 0; // Sử dụng để làm dữ liệu bắt đầu cho dòng thứ 2			if($start < 7){ // Dòng đầu tiên				echo '<tr>';				for($i = 1; $i <= 7; $i++){					$position = position_cell($cell);					if($i == 1) $sunday = 'first '; if($i == 7) $saturday = 'last '; // Chủ nhật + Thứ bảy					if($i <= $start){ // Những ngày cuối cùng của tháng trước						$prev = $arr_prev[($i-1)];						echo '<td class="'.$sunday.$saturday.'prev col-'.$position['col'].' row-'.$position['row'].'">';						echo '<span class="date">'.$prev.'/'.$month_prev.'</span>';						echo '</td>';					}					else{ // Những ngày đầu tiên của tháng hiện tại						$first = ($i-$start);						if($first.'/'.$month.'/'.$year == $day.'/'.$month.'/'.$year) $current_day = 'current '; // Hiện tại						echo '<td class="'.$current_day.$sunday.$saturday.'col-'.$position['col'].' row-'.$position['row'].'">';						echo '<span class="date">'.$first.'</span>';						echo '</td>';					}					$cell++;					$current_day = ''; $sunday = ''; $saturday = '';				}				echo '</tr>';			}			$n = 0; // Bắt đầu dòng thứ 2 và đi đến hết tháng hiện tại			for($i = ($first+1); $i <= $total; $i++){				$position = position_cell($cell);				if(($n + 1) % 7 == 0) $saturday = 'last '; if($n % 7 == 0) $sunday = 'first '; if($i.'/'.$month.'/'.$year == $day.'/'.$month.'/'.$year) $current_day = 'current '; // Hiện tại + Chủ nhật + Thứ bảy				if($cell == 28){ // Nếu dòng cuối					if($n > 0 && $n % 7 == 0){ echo '</tr><tr class="last">'; $n = 0; } // Nếu cuối dòng thì đóng thẻ				}				else{					if($n > 0 && $n % 7 == 0){ echo '</tr><tr>'; $n = 0; } // Nếu cuối dòng thì đóng thẻ				}				echo '<td class="'.$current_day.$sunday.$saturday.'col-'.$position['col'].' row-'.$position['row'].'">';				echo '<span class="date">'.$i.'</span>';				echo '</td>';				$n++;				$cell++;				$current_day = ''; $sunday = ''; $saturday = '';			}			$next = 1; // Bắt đầu tháng tiếp theo			for($i = $n; $i < 7; $i++){				$position = position_cell($cell);				if($i == 0) $sunday = 'first '; if($i == 6) $saturday = 'last '; // Chủ nhật + Thứ bảy				echo '<td class="'.$sunday.$saturday.'next col-'.$position['col'].' row-'.$position['row'].'">';				echo '<span class="date">'.$next.'/'.$month_next.'</span>';				echo '</td>';				$next++;				$cell++;				$current_day = ''; $sunday = ''; $saturday = '';			}			echo '</tr>';			?>		</table>	</div><!-- #cms-table -->	<div class="cms-clear"></div></div><!-- #cms-container -->