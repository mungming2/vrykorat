<?php 
    switch ($_GET["page"]) {
        case "dashboard-del":
          	include("dashboard.php");
          	echo "<script>document.getElementById('header_name').innerHTML='กระดานข้อมูล';</script>";
          	$header_name = 'กระดานข้อมูล';
          	break;
////member
        case "member_list":
          	include("menu-member/member_list.php");
          	echo "<script>document.getElementById('header_name').innerHTML='รายชื่อสมาชิก';</script>";
          	break;
        case "member_add":
          	include("menu-member/member_add.php");
          	echo "<script>document.getElementById('header_name').innerHTML='เพิ่มสมาชิก';</script>";
              break;
        case "member-edit":
          	include("menu-member/member_edit.php");
          	echo "<script>document.getElementById('header_name').innerHTML='แก้ไขข้อมูลสมาชิก';</script>";
          	break;
/////agent
        case "agent_list":
            include("menu-agent/agent_list.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายชื่อตัวแทน';</script>";
            break;
        case "agent_edit":
            include("menu-agent/agent_edit.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายชื่อตัวแทน >> แก้ไขข้อมูลตัวแทน';</script>";
            break;
        case "agent_info":
            include("menu-agent/agent_info.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายชื่อตัวแทน >> ข้อมูลเพิ่มเติมของตัวแทน';</script>";
            break;
        case "agent_add":
            include("menu-agent/agent_add.php");
            echo "<script>document.getElementById('header_name').innerHTML='เพิ่มตัวแทน';</script>";
            break;
//////stock
        case "stock-forms":
          	include("menu-stock/forms.php");
          	echo "<script>document.getElementById('header_name').innerHTML='แบบฟอร์มต่างๆ';</script>";
          	break;
        case "forms_edit":
            include("menu-stock/forms_edit.php");
            echo "<script>document.getElementById('header_name').innerHTML='แก้ไขแบบฟอร์ม';</script>";
            break;
        case "stock-report1":
          	include("menu-stock/report1.php");
          	echo "<script>document.getElementById('header_name').innerHTML='รายงานสต็อกจากสำนักงานใหญ่';</script>";
          	break;
        case "stock-report2":
            include("menu-stock/report2.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานเบิกให้ตัวแทน';</script>";
            break;
        case "stock-report3":
            include("menu-stock/report3.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานสต็อกรายวัน';</script>";
            break;
        case "stock-report4":
            include("menu-stock/report4.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานทะเบียนสต็อก';</script>";
            break;
        case "stock-report5":
            include("menu-stock/report5.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานสต็อกตัวแทน';</script>";
            break;
        case "stock-report6":
            include("menu-stock/report6.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานสต็อกรายวัน';</script>";
            break;
        case "stock-report7":
            include("menu-stock/report7.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานสต็อกกรมธรรม์ภาคสมัครใจ';</script>";
            break;
/////payment
        case "payment-forms1":
            include("menu-payment/forms1.php");
            echo "<script>document.getElementById('header_name').innerHTML='แบบฟอร์ม พรบ.';</script>";
            break;
        case "payment-forms2":
            include("menu-payment/forms2.php");
            echo "<script>document.getElementById('header_name').innerHTML='แบบฟอร์มสมัครใจ';</script>";
            break;
        case "payment-report1":
            include("menu-payment/report1.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงาน พรบ.';</script>";
            break;
        case "payment-report2":
            include("menu-payment/report2.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานสมัครใจ';</script>";
            break;
        case "payment-report3":
            include("menu-payment/report3.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานยอดขายประจำวัน พรบ. และ สมัครใจ';</script>";
            break;
        case "payment-report4":
            include("menu-payment/report4.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานลูกหนี้ค้างชำระ';</script>";
            break;
        case "payment-report5":
            include("menu-payment/report5.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานการนำส่งเบี้ยตัวแทน';</script>";
            break;
        case "payment-edit1":
            include("menu-payment/form1_edit.php");
            echo "<script>document.getElementById('header_name').innerHTML='แก้ไขแบบฟอร์ม';</script>";
            break;
        case "payment-edit2":
            include("menu-payment/form2_edit.php");
            echo "<script>document.getElementById('header_name').innerHTML='แก้ไขแบบฟอร์ม';</script>";
            break;
/////renewal
        case "renewal-forms1":
            include("menu-renewal/forms1.php");
            echo "<script>document.getElementById('header_name').innerHTML='แบบฟอร์มต่อทะเบียน';</script>";
            break;
        case "renewal-report1":
            include("menu-renewal/report1.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงาน ต่อทะเบียน';</script>";
            break;
        case "renewal-edit1":
            include("menu-renewal/forms1_edit.php");
            echo "<script>document.getElementById('header_name').innerHTML='แก้ไขแบบฟอร์ม ต่อทะเบียน';</script>";
            break;
//////miscellany
        case "miscellany-forms1":
            include("menu-miscellany/forms1.php");
            echo "<script>document.getElementById('header_name').innerHTML='ฟอร์มเบ็ดเตล็ดอุบัติเหตุและสุขภาพ /อื่น';</script>";
            break;
        case "miscellany-forms2":
            include("menu-miscellany/forms2.php");
            echo "<script>document.getElementById('header_name').innerHTML='ฟอร์มเบ็ดเตล็ดเกี่ยวกับรถ';</script>";
            break;
        case "miscellany-edit1":
            include("menu-miscellany/form1_edit.php");
            echo "<script>document.getElementById('header_name').innerHTML='แก้ไขแบบฟอร์ม';</script>";
            break;
        case "miscellany-edit2":
            include("menu-miscellany/form2_edit.php");
            echo "<script>document.getElementById('header_name').innerHTML='แก้ไขแบบฟอร์ม';</script>";
            break;
        case "miscellany-report1":
            include("menu-miscellany/report1.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงาน อุบัติเหตุและสุขภาพ /อื่น';</script>";
            break;
        case "miscellany-report2":
            include("menu-miscellany/report2.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงาน เกี่ยวกับรถ';</script>";
            break;
        case "miscellany-report3":
            include("menu-miscellany/report3.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานยอดขายประจำวัน';</script>";
            break;
        case "miscellany-report4":
            include("menu-miscellany/report4.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานลูกหนี้ค้างชำระ';</script>";
            break;
//////รายงานอื่นๆ
        case "report1":
            include("menu-report/report1.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานใบเตือนต่ออายุ';</script>";
            break;
        case "report2":
            include("menu-report/report2.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานเคลียร์เบี้ย';</script>";
            break;
        case "report3":
            include("menu-report/report3.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานเจ้าหนี้';</script>";
            break;
//////รายรับ รายจ่าย
        case "income-forms1":
            include("menu-income/forms1.php");
            echo "<script>document.getElementById('header_name').innerHTML='ฟอร์มรายรับ-รายจ่าย';</script>";
            break;
        case "income-forms2":
            include("menu-income/forms2.php");
            echo "<script>document.getElementById('header_name').innerHTML='ฟอร์มรับเช็ค';</script>";
            break;
        case "income-edit1":
            include("menu-income/form1_edit.php");
            echo "<script>document.getElementById('header_name').innerHTML='แก้ไขแบบฟอร์มรายรับ-รายจ่าย';</script>";
            break;
        case "income-edit2":
            include("menu-income/form2_edit.php");
            echo "<script>document.getElementById('header_name').innerHTML='แก้ไขแบบฟอร์ม';</script>";
            break;
        case "income-report1":
            include("menu-income/report1.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานรายรับ';</script>";
            break;
        case "income-report2":
            include("menu-income/report2.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานรายจ่าย';</script>";
            break;
        case "income-report3":
            include("menu-income/report3.php");
            echo "<script>document.getElementById('header_name').innerHTML='รายงานรับเช็ค';</script>";
            break;
//////พิมพ์เอกสาร เก็บเงิน
        case "bill-forms1":
            include("menu-bill/forms1.php");
            echo "<script>document.getElementById('header_name').innerHTML='ฟอร์มพิมพ์เอกสารเรียกเก็บเงิน';</script>";
            break;
        case "bill-forms2":
            include("menu-bill/forms2.php");
            echo "<script>document.getElementById('header_name').innerHTML='ฟอร์มพิมพ์ใบเสร็จรับเงิน';</script>";
            break;
        default:
			include("menu-stock/forms.php");
          	echo "<script>document.getElementById('header_name').innerHTML='แบบฟอร์มต่างๆ';</script>";
          	//include("dashboard.php");
          	//echo "<script>document.getElementById('header_name').innerHTML='กระดานข้อมูล';</script>";
    }


?>