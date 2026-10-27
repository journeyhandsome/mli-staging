<style>
/* @import url('~/assets/css/lptf/normalize.css');
@import url('~/assets/css/lptf/jquery.fancybox.css'); */
@import url('~/assets/css/lptf/lp.css');
@import url('~/assets/css/lptf/lp-cp.css');
</style>

<template>
  <main>
        <section class="mv">
           <div class="headerText">
                <div class="title">
                    <div class="title_col_1">
                        <img class="title_col_1_img1" src="/assets/images/lptf-new/subtitle.png" alt="SPECIAL PRICE FOR">
                        <img class ="title_col_1_img2" src="/assets/images/lptf-new/title.png" alt="Transfer Students">
                    </div>
                </div>
                 <div class="title_middle">
                    <div class="title_middle_col_1">
                        <div class="m_text">CUSTOMIZABLE<br>AND FLEXIBLE<br>SCHEDULE</div>
                        <div class="m_subText">as few as<br>2 days per<br>week</div>
                    </div>
                </div>
                
                <div class="title_middele_right">
                    <div class="mv__priceWrap">
                        <div class="mv_price_col_1">
                            <div>
                                <p class="mv__priceText">AFFORDABLE<br>PRICE as low as</p>
                            </div>
                            <div class="mv_price_col_1_1">
                                <div class="mv__price">$</div>
                                <div class="mv__large">100</div>
                                <div class="mv__small">.50</div>
                                <div class="mv__week">/ 1 week</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mv__btn">
                    <div class="bt_col1">
                    </div>
                    <div class="bt_col2">
                        <a href="../admission">APPLY ONLINE</a>
                    </div>
                </div>
            </div>         
        </section>
        <section class="intro">
            <div class="mv__btn_2">
                    <div class="bt2_col1">
                    </div>
                    <div class="bt2_col2">
                        <a href="../admission">APPLY ONLINE</a>
                    </div>
                </div>
            <div class="intro_img"></div>
        </section>
        <br>
        <section class="intro_inner">
            <div class="intro_inner_col1">
                <p class="intro__text">Mentor Language Institute was founded in 2002 and is located in two popular areas:<br><span class="intro__strong">Westwood</span> and <span class="intro__strong">Hollywood</span>. We help students from all over the world to improve their English.</p>
            </div>
            <div class="intro_inner_bg"></div>
            <div class="intro_inner_logo">
                <div class="intro_inner_logo1"></div>
            </div>
            <div class="intro_inner_logo2">
                    <div class="inner intro__textWrap">
                        <h3 class="intro__catch"><img src="/assets/images/lptf-new/intro_text.png" alt="NOT SATISFIED WITH YOUR CURRENT SCHOOL?"></h3>
                        <p class="intro__lead">If so, you can easily transfer to MLI.</p>
                    </div>
            </div>
        </section>
        <br>
        <section class="trial">
            <div class="trial_col1 divglow">
                  <div class="trial_col1_link" @click="freetrial">SCHEDULE A FREE TRIAL CLASS</div>
            </div>
        </section>
        <br>
        <section class="reasons">
            <div class="reasons_col1">
                3 REASONS TO CHOOSE MLI:
            </div>
        </section>
        <br>
        <section class="reason_1">
            <div class="reason_1_col1">
                <img class="reason_1_col1_img" src="/assets/images/lptf-new/reason_title.png" alt="">
            </div>
            <div class="reason_1_col1_img_txt">
                Reason #1:<br>Low Priced Tuition
            </div>
        </section>
        <br>
        <section class="reasonIntro">
            <div class="reasonIntro__textBox">
                <p class="reason__heading--blue">Pay less for your English classes</p>
                <p class="reasonIntro__text">MLI is known for its great programs and low tuition prices. Our tuition prices are generally far more economical than other language schools, especially during this time of inflation.</p>
            </div>
            <div class="reasonIntro__special">
                <p class="reasonIntro__heading">SPECIAL PRICE FOR<br><span class="reasonIntro__green">TRANSFER STUDENTS</span><br><span class="reasonIntro__medium">as low as</span><span class="reasonIntro__price">$325<span class="reasonIntro__small">.50 / 4 weeks</span></span></p>
                <p class="reasonIntro__note">* When including full vacation</p>
            </div>
        </section>
        <br>
        <section class="reason_price">
            <div class="reason_price_col1">
                <img class="reason_price_col1_img" src="/assets/images/lptf-new/reason_table.png" alt="">
            </div>
            <div class="reason_price_col2">
               
                <div class=""></div>
                <div class="">Tuition<br>(Morning)</div>
                <div class="">Tuition<br>(Afternoon &amp; Evening)</div>
                <div class="reason_txt"><p>*Only for local <br> promotional price
                </p></div>

                <div class="reason_price_week">12 weeks</div>
                <div class="gray">$ 2,868</div>
                <div class="orange">$ 1,434*</div>
                <div class="reason_txt"> Initial Fee: $150 <br>One time Application</div>

                <div class="reason_price_week">24 weeks</div>
                <div class="gray">$ 5,208</div>
                <div class="orange">$ 2,604*</div>
                <div class="reason_txt">Processing Fee <br>**Non-refundable</div>

                <div class="reason_price_week">48 weeks</div>
                <div class="gray">$ 9,648</div>
                <div class="orange">$ 4,284*</div>
                <div class="reason_txt"></div>
    
            </div>
            <div class="cp"> *Only for local promotional price <br>
                Initial Fee: $150 One time Application <br>
                Processing Fee <br>**Non-refundable
            </div>
        </section>
        <br>
        <section class="compare">
            <div class="compare_col1">
                <h5 class="reasonCompare__title">Compare the schools around us</h5>
                <p class="reasonCompare__text">Our prices are very competitive and fairly priced for everyone</p>
            </div>
            <div class="compare_col2">
                <img class="reasonCompare__img" src="/assets/images/lptf-new/reason_compare.png" alt="">
                    <div class="cells c1">
                        <img src="/assets/images/lptf-new/check_01.png" alt="">
                        <div class="c1_width">$2,868 <br> <span class="cellWeeks">12 weeks</span></div>
                    </div>

                    <div class="cells c2">
                        <img src="/assets/images/lptf-new/check_01.png" alt="">
                        <div class="c1_width">$1,434 <br> <span class="cellWeeks">12 weeks</span></div>
                    </div>

                    <div class="cells c3">
                        <img src="/assets/images/lptf-new/check_01.png" alt="">
                        <div class="c1_width">$1,434 <br> <span class="cellWeeks">12 weeks</span></div>
                    </div>

                    <div class="cells c1_2_m c1_2">
                        <img class="c1_2_img" src="/assets/images/lptf-new/check_02.png" alt="">
                        <div class="c2_width">$6,300 <br> <span class="cellWeeks">12 weeks</span></div>
                        <div class="c1_2_label label_3 cellWeeks"> General English</div>
                    </div>
                    <div class="cells c1_2_m c1_3">
                        <img class="c1_2_img" src="/assets/images/lptf-new/check_02.png" alt="">
                        <div class="c2_width">$6,300 <br> <span class="cellWeeks">12 weeks</span></div>
                        <div class="c1_2_label label_3 cellWeeks"> General English</div>
                    </div>
                    <div class="cells c1_2_m c1_4">
                        <div class="na" style="color:#282e6c;">N/A</div>
                    </div>

                    <div class="cells c2_2_m c2_2">
                        <img class="c1_2_img" src="/assets/images/lptf-new/check_03.png" alt="">
                        <div class="c2_width">$5,900 <br> <span class="cellWeeks">12 weeks</span></div>
                        <div class="c1_2_label label_3 cellWeeks"> General English</div>
                    </div>
                    <div class="cells c2_2_m c2_3">
                        <img class="c1_2_img" src="/assets/images/lptf-new/check_03.png" alt="">
                        <div class="c2_width">$5,900 <br> <span class="cellWeeks">12 weeks</span></div>
                        <div class="c1_2_label label_3 cellWeeks"> General English</div>
                    </div>
                    <div class="cells c1_2_m c2_4">
                        <div class="na" style="color:#23508b;">N/A</div>
                    </div>

                    <div class="cells c3_2_m c3_2">
                        <img class="c1_2_img" src="/assets/images/lptf-new/check_04.png" alt="">
                        <div class="c2_width">$3,400 <br> <span class="cellWeeks">12 weeks</span></div>
                        <div class="c1_2_label label_3 cellWeeks"> ESL</div>
                    </div>
                    <div class="cells c3_2_m c3_3">
                        <img class="c1_2_img" src="/assets/images/lptf-new/check_04.png" alt="">
                        <div class="c2_width">$2,040 <br> <span class="cellWeeks">12 weeks</span></div>
                        <div class="c1_2_label label_3 cellWeeks"> ESL</div>
                    </div>
                    <div class="cells c1_2_m c3_4">
                        <div class="na" style="color:#e9953d;">N/A</div>
                    </div>

                    <div class="cells c4_2_m c4_2">
                        <img class="c1_2_img" src="/assets/images/lptf-new/check_05.png" alt="">
                        <div class="c2_width">$5,400 <br> <span class="cellWeeks">12 weeks</span></div>
                        <div class="c1_2_label label_3 cellWeeks"> General English</div>
                    </div>
                    <div class="cells c4_2_m c4_3">
                        <img class="c1_2_img" src="/assets/images/lptf-new/check_05.png" alt="">
                        <div class="c2_width">$5,400 <br> <span class="cellWeeks">12 weeks</span></div>
                        <div class="c1_2_label label_3 cellWeeks"> General English</div>
                    </div>

                    <div class="cells c1_2_m c4_4">
                        <div class="na" style="color:#e1623c;">N/A</div>
                    </div>
            </div>
        </section>
        <!--
        <section class="reason">
           
            </div>
            <div class="reasonCompare">
                <div class="inner">
                    <h5 class="reasonCompare__title">Compare the schools around us</h5>
                    <p class="reasonCompare__text">Our prices are very competitive and fairly priced for everyone</p>
                    <div class="reasonCompare__wrapper">
                    <div class="reasonCompare__table">
                        <img class="reasonCompare__img" src="assets/images/reason_compare.png" alt="">
                        <ul class="reasonCompare__mentor">
                            <li class="reasonCompare__item--head">$2,868<br><span class="reasonCompare__small--head">12 weeks</span></li>
                            <li class="reasonCompare__item--head">$1,434<br><span class="reasonCompare__small--head">12 weeks</span></li>
                            <li class="reasonCompare__item--head">$1,434<br><span class="reasonCompare__small--head">12 weeks</span></li>
                        </ul>
                        <ul class="reasonCompare__school">
                            <li class="reasonCompare__item--k">$6,300<br><span class="reasonCompare__small">12 weeks<br>General English</span></li>
                            <li class="reasonCompare__item--k">$6,300<br><span class="reasonCompare__small">12 weeks<br>General English</span></li>
                            <li class="reasonCompare__item--k">N/A</li>
                        </ul>
                        <ul class="reasonCompare__school">
                            <li class="reasonCompare__item--e">$5,900<br><span class="reasonCompare__small">12 weeks<br>General English</span></li>
                            <li class="reasonCompare__item--e">$5,900<br><span class="reasonCompare__small">12 weeks<br>General English</span></li>
                            <li class="reasonCompare__item--e">N/A</li>
                        </ul>
                        <ul class="reasonCompare__school">
                            <li class="reasonCompare__item--l">$3,400<br><span class="reasonCompare__small">12 weeks<br>ESL</span></li>
                            <li class="reasonCompare__item--l">$2,040<br><span class="reasonCompare__small">12 weeks<br>ESL</span></li>
                            <li class="reasonCompare__item--l">N/A</li>
                        </ul>
                        <ul class="reasonCompare__school">
                            <li class="reasonCompare__item--c">$5,400<br><span class="reasonCompare__small">12 weeks<br>General English</span></li>
                            <li class="reasonCompare__item--c">$3,300<br><span class="reasonCompare__small">12 weeks<br>General English</span></li>
                            <li class="reasonCompare__item--c">N/A</li>
                        </ul>
                    </div>  
                    </div>
                    <p class="reasonCompare__note">* All prices and promotions are subject to change without notice. ** This promotion is available for transfer or renewal students only. *** Students are eligible for only one promotion at a time and only students enrolled for at least 12 weeks are eligible for “renewal” promotion price.</p>
                </div>
            </div>
            <a class="greenBtn" href="#contact">DOWNLOAD BROCHURE</a>
            <h4 class="reason__title--orange" id="programs">Reason #2:<br>Flexible Class Schedules</h4>
            <div class="reasonFlex">
                <div class="inner">
                    <div class="reasonFlex__flexWrap">
                        <div class="reasonFlex__flexBox">
                            <p class="reason__heading--orange"><span class="reason__heading--orange">Choose the schedule</span><br>that fits you best</p>
                        </div>
                        <p class="reasonFlex__text">MLI offers very flexible schedules across the program to fit your lifestyle. With our new Class-Customizable Conversation Program, your flexibility greatly expands.</p>
                    </div>
                    <div class="reasonFlex__program">
                        <div class="reasonFlex__box">
                            <p class="reasonFlex__head">Morning Program</p>
                            <div class="reasonFlex__textBox">
                                <p class="reasonFlex__list">• ESL Program (8 levels)<br>• TOEFL Test Preparation Program</p>
                                <p class="reasonFlex__detail">9:00 AM to 1:15 PM<br><span class="reasonFlex__small">Offered Monday through Thursday</span></p>
                            </div>
                        </div>
                        <div class="reasonFlex__box">
                            <p class="reasonFlex__head">Afternoon and Evening <br class="sp">Program</p>
                            <div class="reasonFlex__textBox">
                                <p class="reasonFlex__list">• Conversation Program (4 levels)</p>
                                <p class="reasonFlex__detail">Afternoon: 1:45 PM to 6:00 PM<br><span class="reasonFlex__small">Offered Monday through Thurday</span></p>
                                <p class="reasonFlex__detail">Evening: 6:30 PM to 10:45 PM<br><span class="reasonFlex__small">Offered only on Mondays and Wednesdays</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reasonText" id="schedule">
                <div class="inner">
                    <p class="reasonText__lead"><span class="reasonText__line">You can choose a program with 2 days/wk, 3 days/wk, or 4 days/wk!</span><br>Our new <span class="reasonText__strong">Class-Customizable Conversation Program,</span> in the Afternoons and Evenings offers dynamic flexibility to your class schedule and lifestyle.</p>
                </div>
            </div>
            <div class="reasonSchedule">
                <div class="inner">
                    <p class="reasonSchedule__lead">You need to take Class A through D in a week in the order of A, B, C and D.</p>
                    <div class="reasonSchedule__wrapper">
                        <div class="reasonSchedule__table">
                            <div class="reasonSchedule__flexWrap">
                                <p class="reasonSchedule__head">Monday</p>
                                <p class="reasonSchedule__head">Tuesday</p>
                                <p class="reasonSchedule__head">Wednesday</p>
                                <p class="reasonSchedule__head">Thursday</p>
                            </div>
                            <div class="reasonSchedule__flexWrap">
                                <p class="reasonSchedule__time--top">9:00 AM</p>
                                <p class="reasonSchedule__time--bottom">1:15 PM</p>                            
                                <p class="reasonSchedule__text--orange">ESL<br>or<br>TOEFL</p>
                                <p class="reasonSchedule__text--orange">ESL<br>or<br>TOEFL</p>
                                <p class="reasonSchedule__text--orange">ESL<br>or<br>TOEFL</p>
                                <p class="reasonSchedule__text--orange">ESL<br>or<br>TOEFL</p>
                            </div>
                            <div class="reasonSchedule__flexWrap">
                                <p class="reasonSchedule__time--top">1:45 PM</p>
                                <p class="reasonSchedule__time--bottom">6:00 PM</p>                              
                                <p class="reasonSchedule__text--green">Conversation<br>Program<br>A</p>
                                <p class="reasonSchedule__text--blue">Conversation<br>Program<br>B</p>
                                <p class="reasonSchedule__text--green">Conversation<br>Program<br>C</p>
                                <p class="reasonSchedule__text--purple">Conversation<br>Program<br>D</p>
                            </div>
                            <div class="reasonSchedule__flexWrap">
                                <p class="reasonSchedule__time--top">6:30 PM</p>
                                <p class="reasonSchedule__time--bottom">10:45 PM</p>                                
                                <p class="reasonSchedule__text--blue">Conversation<br>Program<br>B</p>
                                <p class="reasonSchedule__text--purple mr">Conversation<br>Program<br>D</p>
                            </div>
                        </div>
                    </div>
                    <p class="reasonSchecule__exmaple">Example: Conversation Program => Monday A &amp; B + Wednesday C &amp; D (2 days/wk) </p>
                </div>
            </div>
            <a class="greenBtn" href="#contact">ASK A QUESTION</a>
            <h4 class="reason__title--purple" id="location">Reason #3:<br>Great Locations in Los Angeles</h4>
            <div class="reasonLocation">
                <div class="inner">
                    <div class="reasonLocation__flexWrap">
                        <div class="reasonLocation__flexBox">
                            <p class="reason__heading--purple"><span class="reason__heading--purple">Don't have a car?</span><br>No worries.</p>
                        </div>
                        <div class="reasonLocation__flexBox">
                            <p class="reasonLocation__text">MLI campuses are located in great and popular areas of Los Angeles, specifically in the center of Westwood and Hollywood.<br>Convenient access through public transportation means that a car is not necessary.</p>
                        </div>
                    </div>
                    <div class="reasonLocation__mapWrap">
                        <div class="reasonLocation__mapBox">
                            <div class="reasonLocation__map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d826.3568826679748!2d-118.4435785!3d34.0585531!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bbf6308a41cf%3A0x9988e75762b8ff3b!2sMentor%20Language%20Institute!5e0!3m2!1sen!2sjp!4v1681882612821!5m2!1sen!2sjp" width="432" height="241" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <p class="reasonLocation__address">10880 Wilshire Blvd #122, Los Angeles, CA 90024, United States</p>
                            <div class="reasonLocation__access">
                                <p class="reasonLocation__area">WESTWOOD</p>
                                <p class="reasonLocation__desc">The Westwood Campus is located just 10 minutes from<br>Beverly Hills, famous for its world-renowned shopping and,<br>fashion areas, such as Rodeo Drive and Beverly Drive.<br>Beverly Hills is one of the most luxurious cities in Los Angeles.</p>
                            </div>
                        </div>
                        <div class="reasonLocation__mapBox">
                            <div class="reasonLocation__map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d412.9706926037186!2d-118.34460892299424!3d34.10114629931431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf239f1c4a45%3A0x6953aa45bd461a42!2sMentor%20Language%20Institute%20-%20Hollywood!5e0!3m2!1sen!2sjp!4v1681883684501!5m2!1sen!2sjp" width="432" height="241" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <p class="reasonLocation__address">7080 Hollywood Blvd #314, Los Angeles, CA 90028, United States</p>
                            <div class="reasonLocation__access">
                                <p class="reasonLocation__area">HOLLYWOOD</p>
                                <p class="reasonLocation__desc">The Hollywood campus is within walking distance of the <br>famous Chinese Theater and Walk of Fame. Hollywood<br>is always exciting, surrounded by popular theaters,<br>fashionable restaurants, designer shops, and clubs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="process" id="howto">
            <div class="inner"> 
                <h3 class="topTitle">EASY TRANSFER PROCESS</h3>
                <p class="process__lead">We make the transfer process seamless and stress-free</p>
                <div class="process__flexWrap">
                    <p class="process__text">Our multilingual staff is friendly and helpful. They are always ready to support you in the most important aspects of <br class="pc">your enrollment, including: <br class="pc">documentations, class <br class="pc">information, dormitory <br class="pc">information, transportation <br class="pc">information, and services.</p>
                    <ul class="process__step">
                        <li class="process__box--01">
                            <a class="popup" href="#step01">
                                <p class="process__head">STEP 1</p>
                                <p class="process__desc--01">Collect<br>documents<br>for transfer</p>
                                <p class="process__btn">>> READ MORE</p>
                            </a>
                        </li>
                        <li class="process__box--02">
                            <a class="popup" href="#step02">
                                <p class="process__head">STEP 2</p>
                                <p class="process__desc--02">Fill out our<br>online application<br>and pay $150:<br>Processing fee<br>(Non-refundable)<br>payment. </p>
                                <p class="process__btn">>> READ MORE</p>
                            </a>
                        </li>
                        <li class="process__box--03">
                            <a class="popup" href="#step03">
                                <p class="process__head">STEP 3</p>
                                <p class="process__desc--03">New student<br>orientation will start<br>1:00pm on Mondays.<br>(If the Monday is a<br>holiday, then<br>orientation will take<br>place on Tuesday)</p>
                                <p class="process__btn">>> READ MORE</p>
                            </a>
                        </li>
                    </ul>
                    <div class="stepBox" id="step01" style="display: none">
                        <p class="stepBox__head">Step 1</p>
                        <p class="stepBox__text">Prepare the documents listed below and bring them to MLI.</p>
                        <p class="stepBox__text">a) Signed Transfer Form<br><a class="stepBox__link--01" href="../documents/2022/TF form - Westwood - 2022.pdf">Download Westwood Transfer Form</a><br><a class="stepBox__link--02" href="../documents/2022/TF form - Westwood - 2022.pdf">Download Hollywood Transfer Form</a><br>b) Passport<br>c) Visa<br>d) I-94<br>e) Bank statement with minimum balance of $4000 issued within 3 month</p>
                    </div>
                    <div class="stepBox" id="step02" style="display: none">
                        <p class="stepBox__head">Step 2</p>
                        <p class="stepBox__text">You can fill your online application and pay your processing fee of $150 from the link below.<br><a href="../admission">https://mliesl.edu/admission</a></p>
                        <p class="stepBox__text">We will issue the acceptance letter once everything is set.<br>You can provide the acceptance letter to your current school to release your SEVIS ID to us.</p>
                    </div>
                    <div class="stepBox" id="step03" style="display: none">
                        <p class="stepBox__head">Step 3</p>
                        <p class="stepBox__text">You can check our school calendar to check your starting dates from the link below.<br><a href="../school-calendar">https://mliesl.edu/school-calendar/</a></p>
                    </div>
                </div>
                <a class="greenBtn" href="../admission/">APPLY NOW</a>
            </div>
            <div class="schedule">
                <div class="inner">
                    <div class="schedule__flexWrap">
                        <div class="schedule__textBox">
                            <p class="schedule__text">STILL NOT SURE?</p>
                            <p class="schedule__text">TRY THE CLASS FOR FREE<br>AND SEE IF YOU LIKE IT!</p>
                        </div>
                        <a class="schedule__btn" href="../freetrial">SCHEDULE A FREE<br>TRIAL LESSON</a>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="contact" id="contact">
            <div class="inner">
                <h3 class="contact__title">CONTACT / ASK QUESTIONS</h3>
                <form method="post"  action="confirm.php">
                    <div>
                        <div>
                            <div class="form-group mb-4">
                                <label>Your Name <span class="hutoaka">*</span></label>
                                <input name="name" required="required" class="form-control highlight" type="text">
                            </div>
                        </div>
                        <div>
                            <div class="form-group mb-4">
                                <label>Your Email <span class="hutoaka">*</span></label>
                                <input type="email" name="email" required="required" class="form-control highlight">
                            </div>
                        </div>
                        <div>
                            <div class="form-group mb-4"><label>Phone Number <span class="hutoaka">*</span></label>
                                <input name="phone" required="required" class="form-control highlight" type="text">
                            </div>
                        </div>
                        <div>
                            <div class="form-check mb-4">
                                <input type="checkbox" name="phone_call" class="form-check-input"> 
                                <label class="form-check-label">I do not want to receive a call from MLI</label>
                            </div>
                        </div>
                        <div>
                            <div id="campus" class="form-group mb-4">
                                <label>Campus Preference <span class="hutoaka">*</span></label>
                                <select required="required" class="form-control" name="campus">
                                    <option selected="" value="Westwood">Westwood</option>
                                    <option value="Hollywood">Hollywood</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div id="time_to_start" class="form-group mb-4">
                                <label>Approximately how soon do you plan on starting your program in the U.S.? <span class="hutoaka">*</span></label>
                                <select required="required" class="form-control" name="start">
                                    <option value="">---</option>
                                    <option value="one month">One Month</option>
                                    <option value="three months">Three Months</option>
                                    <option value="six months">Six Months</option>
                                    <option value="one year or more">One Year or More</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div id="media" class="form-group mb-4">
                                <label>How did you know MLI? <span class="hutoaka">*</span></label>
                                <select required="required" class="form-control" name="media">
                                    <option selected="" value="An agent">An Agent</option>
                                    <option value="Friend">Friend</option>
                                    <option value="Internet">Internet</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="form-group mb-4"><label>Your Message</label>
                                <textarea rows="3" name="message" class="form-control "></textarea>
                            </div>
                        </div>
                    </div> <button type="submit" class="btn btn-success btn-block">Send</button>
                </form>
            </div>
        </section> -->
    </main>
</template>

<script>
export default {
    
    data: function() {
        return {
            details:{name:null,email:null,phone:null,receiving:false, campus:null, program:null, reference:null, message:null}
        }
    },
    methods:{
        // async send() {
        //     await this.$axios.post('/api/lptf/question', this.details)
        //     .then(function(response) {
        //         if (response.status == 200) {
        //             location.href = "/tf_material/thanks"
        //         }
        //     });
        // },
        freetrial() {
            this.$router.push('/freetrial')
        }
    }
}
</script>

