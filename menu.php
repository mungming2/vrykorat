<aside class="left-sidebar" data-sidebarbg="skin5" style="overflow-y: auto;">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" >
                <?php foreach ($_SESSION['get_menu'] as $key => $value_get_menu) { 
                    if($value_get_menu == 1){ ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-boxes"></i><span class="hide-menu"> ข้อมูลสต็อก</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item pl-2"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-file-alt"></i><span class="hide-menu"> แบบฟอร์ม </span></a>
                                    <ul aria-expanded="false" class="collapse  secondary-level">
                                        <li class="sidebar-item pl-3"><a href="?page=stock-forms" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>เบิก / ขอใช้ </span></a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-item pl-2"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-chart-bar"></i><span class="hide-menu"> รายงาน </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item pl-3"><a href="?page=stock-report1" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>รายงานขอเบิก </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=stock-report2" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>รายงานเบิกให้ตัวแทน </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=stock-report3" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>รายงานสต็อกรายวัน </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=stock-report4" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>ทะเบียนสต็อก </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=stock-report5" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>สต็อกตัวแทน </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=stock-report6" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>สต็อกรายวัน </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=stock-report7" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>สต็อกกรมธรรม์ภาคสมัครใจ </span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    <?php }elseif($value_get_menu == 2){ ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-car"></i><span class="hide-menu"> งานรับประกัน</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item pl-2"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-file-alt"></i><span class="hide-menu"> แบบฟอร์ม </span></a>
                                    <ul aria-expanded="false" class="collapse  secondary-level">
                                        <li class="sidebar-item pl-3"><a href="?page=payment-forms1" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>พรบ.</span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=payment-forms2" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>สมัครใจ</span></a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-item pl-2"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-chart-bar"></i><span class="hide-menu"> รายงาน </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item pl-3"><a href="?page=payment-report1" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>รายงาน พรบ. </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=payment-report2" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>รายงานสมัครใจ </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=payment-report3" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>ยอดขายประจำวัน </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=payment-report4" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>ลูกหนี้ค้างชำระ </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=payment-report5" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>การนำส่งเบี้ยตัวแทน </span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    <?php }elseif($value_get_menu == 3){ ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-medkit"></i><span class="hide-menu"> เบ็ดเตล็ด</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item pl-2"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-file-alt"></i><span class="hide-menu"> แบบฟอร์ม </span></a>
                                    <ul aria-expanded="false" class="collapse  secondary-level">
                                        <li class="sidebar-item pl-3"><a href="?page=miscellany-forms1" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>อุบัติเหตุ/สุขภาพ/อื่นๆ</span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=miscellany-forms2" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>เกี่ยวกับรถ</span></a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-item pl-2"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-chart-bar"></i><span class="hide-menu"> รายงาน </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item pl-3"><a href="?page=miscellany-report1" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>อุบัติเหตุ/สุขภาพ/อื่นๆ </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=miscellany-report2" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>เกี่ยวกับรถ </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=miscellany-report3" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>ยอดขายประจำวัน </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=miscellany-report4" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>ลูกหนี้ค้างชำระ </span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>   
                    <?php }elseif($value_get_menu == 4){ ?>    
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-copy"></i><span class="hide-menu"> รับบริการต่อทะเบียน</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item pl-2"><a href="?page=renewal-forms1" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>แบบฟอร์ม</span></a></li>
                                <li class="sidebar-item pl-2"><a href="?page=renewal-report1" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>รายงาน</span></a></li>
                            </ul>
                        </li>
                    <?php }elseif($value_get_menu == 5){ ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-list-alt"></i><span class="hide-menu">รายงานอื่นๆ</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="?page=report1" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>ใบเตือนต่ออายุ </span></a></li>
                                <li class="sidebar-item"><a href="?page=report2" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>รายงานเคลียร์เบี้ย </span></a></li>
                                <li class="sidebar-item"><a href="?page=report3" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>รายงานเจ้าหนี้ </span></a></li>
                            </ul>
                        </li>
                    <?php }elseif($value_get_menu == 6){ ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-print"></i><span class="hide-menu">พิมพ์เอกสาร</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="?page=bill-forms1" class="sidebar-link"><i class="fas fa-genderless"></i><span class="hide-menu"> เรียกเก็บเงิน </span></a></li>
                                <li class="sidebar-item"><a href="?page=bill-forms2" class="sidebar-link"><i class="fas fa-genderless"></i><span class="hide-menu"> ใบเสร็จรับเงิน </span></a></li>
                                <li class="sidebar-item"><a href="?page=bill-forms3" class="sidebar-link"><i class="fas fa-genderless"></i><span class="hide-menu">  เรียกเก็บเงินลูกค้ากลุ่มและหน่วยงาน </span></a></li>
                            </ul>
                        </li>
                    <?php }elseif($value_get_menu == 7){ ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-hand-holding-usd"></i><span class="hide-menu">สำนักงาน</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item pl-2"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-file-alt"></i><span class="hide-menu"> แบบฟอร์ม </span></a>
                                    <ul aria-expanded="false" class="collapse  secondary-level">
                                        <li class="sidebar-item pl-3"><a href="?page=income-forms1" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>บันทึกรายรับ-รายจ่าย</span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=income-forms2" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>รับเช็ค</span></a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-item pl-2"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-chart-bar"></i><span class="hide-menu"> รายงาน </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item pl-3"><a href="?page=income-report1" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>รายรับ </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=income-report2" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>รายจ่าย </span></a></li>
                                        <li class="sidebar-item pl-3"><a href="?page=income-report3" class="sidebar-link"><span class="hide-menu"><i class="fas fa-genderless"></i>รับเช็ค </span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    <?php }elseif($value_get_menu == 8){ ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-users fa-fw"></i><span class="hide-menu">ตัวแทน</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="?page=agent_list" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> รายชื่อตัวแทน </span></a></li>
                                <li class="sidebar-item"><a href="?page=agent_add" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> เพิ่มข้อมูลตัวแทน </span></a></li>
                            </ul>
                        </li>
                    <?php }elseif($value_get_menu == 9){ ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-user fa-fw"></i><span class="hide-menu">การจัดการสมาชิก</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="?page=member_list" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> รายชื่อสมาชิก </span></a></li>
                                <li class="sidebar-item"><a href="?page=member_add" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> เพิ่มสมาชิก </span></a></li>
                            </ul>
                        </li>
                <?php }} ?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>