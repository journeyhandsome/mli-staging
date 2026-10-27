<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PriceCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PriceSendToEmailController extends Controller
{
    public function store(Request $request)
    {
    //     $emailInfo = PriceCalculator::create($request->all())->toArray();
    //     $language = $request->has('language') ? $request->language : 'en';
        $emailInfo = $request->all();
        $language = $request->has('language') ? $request->language : 'en';
       
        // if(isset($emailInfo['id'])) {
            $kintone =  $this->kintoneMessage( $emailInfo, $language);
            Mail::send('emails.priceSendToEmail', ["data" => $emailInfo, "language" => $language, "kintone" => $kintone, 'admin' => true ], function($message) use ($emailInfo, $language)
            {
                $to_name = env('APP_NAME');
                $to_email = "contact@mliesl.edu";
                $subject = 'Price Email Estimate [' . global_lang_description($language) .']';
                
                $message->to($to_email, $to_name)->subject($subject);
            });

            Mail::send('emails.priceSendToEmail', ["data" => $emailInfo, "language" => $language, 'admin' => false], function($message) use ($emailInfo, $language)
            {
                $to_name = $emailInfo['fname'];
                $to_email = $emailInfo['email'];
                $subject = 'Price Email Estimate [' . global_lang_description($language) .']';

                $message->to($to_email, $to_name)->subject($subject);
            });
        // }
        // return response()->json($emailInfo);
    }
    public function kintoneMessage($data = [], $language = null) {
        $str = "<br>";
        $str .= "Customer's Message:";
        $str .= "<br>";
        $str .= "{$data['message']}";
        $str .= "<br>";
        $str .= "Customer's Inquiry: <br/><br/> {$data['title']}  <br/> <br/> {$data['name']} \${$data['totalPrice']}(USD)";
        $str .= "<p style='font-size: 18px; font-weight: 600px;'>";
        if( $data['course_title'] ) {
        $str .= "{$data['course_title']} ";
        } else {
        $str .= "Course: {$data['course_description']}";
        }
        $str .= "</p>";
        $str .= "<div class='table-responsive' style='margin-top: -30px !important;'>";
            $str .= "<table class='table table-striped' style='width: 50%; color: #212529;'>";
                if( $language == "jp") {
                    $str .= "<thead>";
                        $str .= "<tr>";
                        $str .= "<th style='vertical-align: bottom; border-bottom: 2px solid #dee2e6; text-align: left;'>項目</th>";
                        $str .= "<th style='vertical-align: bottom; border-bottom: 2px solid #dee2e6; text-align: left;'>金額</th>";
                        $str .= "</tr>";
                    $str .= "</thead>";
                    $str .= "<tbody>";
                        $str .= "<tr>";
                        $str .= "<td>入学申込金</td>";
                        $str .= "<td>{$data['processing_fee']}</td>";
                        $str .= "</tr>";
                        $str .= "<tr>";
                        $str .= "<td>授業料金 ({$data['week']} &nbsp; {$data['weekText']})</td>";
                        $str .= "<td>{$data['tuition']}</td>";
                        $str .= "</tr>";
                            if( $data['visa'] == "student_visa") {
                                $str .= "<tr>";
                                $str .= "<td>SEVIS費　※ビザ取得に必要な費用</td>";
                                $str .= "<td>{$data['sevis']}</td>";
                                $str .= "</tr>";
                                $str .= "<tr>";
                                $str .= "<td>I20 郵送料（eメール）<br> ※I-20をFedExで発送をご希望の場合、送料120ドルが追加となります。</td>";
                                $str .= "<td>{$data['i20']}<br/> &nbsp;</td>";
                                $str .= "</tr>";
                            }
                            if($data['accommodationKey'] != "no") {
                                $str .= "<tr>";
                                $str .= "<td>入居費</td>";
                                $str .= "<td>{$data['housing_placement']}</td>";
                                $str .= "</tr>";
                                $str .= "<tr>";
                                $str .= "<td>滞在費 {$data['week']} &nbsp; {$data['weekText']} &nbsp; [{$data['accommodation']}]</td>";
                                $str .= "<td>{$data['housing_rent']}</td>";
                                $str .= "</tr>";
                                if( $data['extra'] != "") {
                                    $str .= "<tr>";
                                    $str .= "<td>Accommodation Extra Day [{$data['extra']}]</td>";
                                    $str .= "<td>\${$data['extra_day']}</td>";
                                    $str .= "</tr>";
                                }
                                $str .= "<tr>";
                                $str .= "<td>敷金・保証金（一部、返金あり）</td>";
                                $str .= "<td>{$data['security_deposit']}</td>";
                                $str .= "</tr>";
                            }
                            if( $data['transport'] != "") {
                                $str .= "<tr>";
                                $str .= "<td>空港ピックアップ費用</td>";
                                $str .= "<td>{$data['transport']}</td>";
                                $str .= "</tr>";
                            }
                    $str .= "</tbody>";
                } else {
                    $str .= "<thead>";
                        $str .= "<tr>";
                        $str .= "<th style='vertical-align: bottom; border-bottom: 2px solid #dee2e6; text-align: left;'>Heading</th>";
                        $str .= "<th style='vertical-align: bottom; border-bottom: 2px solid #dee2e6; text-align: left;'>Price</th>";
                        $str .= "</tr>";
                    $str .= "</thead>";
                    $str .= "<tbody>";
                        $str .= "<tr>";
                        $str .= "<td>Processing Fee</td>";
                        $str .= "<td>{$data['processing_fee']}</td>";
                        $str .= "</tr>";
                        $str .= "<tr>";
                        $str .= "<td>Tuition ({$data['week']} &nbsp; {$data['weekText']})</td>";
                        $str .= "<td>{$data['tuition']}</td>";
                        $str .= "</tr>";
                        if ($data['visa'] == "student_visa") {
                            $str .= "<tr>";
                                $str .= "<td>SEVIS Fee</td>";
                                $str .= "<td>{$data['sevis']}</td>";
                            $str .= "</tr>";
                            $str .= "<tr>";
                            if($language == "ar") {
                                $str .= "<td>رسوم إرسال I20 عبر البريد الإلكتروني <br /> *إذا طلبت FedEx إرسال نموذج I-20، فستتم إضافة رسوم شحن بقيمة 120 دولارًا.</td>";
                            }
                            elseif($language == "ch") {
                                $str .= "<td>I20 通过电子邮件发送费用 <br/> *如果要求通过联邦快递寄送 I-20，则需加收 120 美元的运费。</td>";
                            }
                            elseif($language == "de") {
                                $str .= "<td>I20-Versandgebühr per E-Mail<br/> *Wenn ein I-20 per FedEx verschickt werden soll, fällt eine Versandgebühr von 120 $ an.</td>";
                            }
                            elseif($language == "fr") {
                                $str .= "<td>Frais d'envoi I20 par email <br /> *Si un I-20 doit être envoyé par FedEx, des frais d'expédition de 120 $ seront ajoutés.</td>";
                            }
                            elseif($language == "it") {
                                $str .= "<td>Commissione di invio I20 via e-mail <br/> *Se viene richiesto l'invio di un I-20 tramite FedEx, verrà aggiunta una tariffa di spedizione di $ 120.</td>";
                            }
                            elseif($language == "kr") {
                                $str .= "<td>이메일을 통한 I20 전송 수수료 <br />*I-20을 FedEx로 보내달라고 요청하는 경우 $120의 배송비가 추가됩니다.</td>";
                            }
                            elseif($language == "por") {
                                $str .= "<td>Taxa de envio I20 por e-mail <br/> *Se for solicitado o envio de um I-20 pela FedEx, uma taxa de envio de US$ 120 será adicionada.</td>";
                            }
                            elseif($language == "ru") {
                                $str .= "<td>Плата за отправку I20 по электронной почте <br/> *Если FedEx запрашивает отправку формы I-20, к ней будет добавлена ​​плата за доставку в размере 120 долларов США.</td>";
                            }
                            elseif($language == "sp") {
                                $str .= "<td>Tarifa de envío I20 por correo electrónico <br/> *Si se solicita que FedEx envíe un I-20, se agregará una tarifa de envío de $120.</td>";
                            }
                            elseif($language == "th") {
                                $str .= "<td>ค่าธรรมเนียมการส่ง I20 ทางอีเมล <br/> *หาก FedEx ร้องขอให้ส่ง I-20 จะมีการบวกค่าธรรมเนียมการจัดส่ง 120 ดอลลาร์</td>";
                            }
                            elseif($language == "tr") {
                                $str .= "<td>E-posta yoluyla I20 gönderme ücreti <br/> *FedEx tarafından bir I-20 gönderilmesi talep edilirse, 120$ nakliye ücreti eklenecektir.</td>";
                            }
                            elseif($language == "tw") {
                                $str .= "<td>I20 透過電子郵件發送費用 <br/> *如果要求透過聯邦快遞寄送 I-20，則需加收 120 美元的運費。</td>";
                            }
                            else{
                                $str .= "<td>I20 sending fee via email <br/> *If an I-20 is requested to be sent by FedEx, a shipping fee of $120 will be added.</td>";
                            }
                            $str .= "<td>{$data['i20']}<br/> &nbsp;</td>";
                            $str .= "</tr>";
                        }
                        if( $data['accommodationKey'] != "no") {
                            $str .= "<tr>";
                            $str .= "<td>Housing Placement Fee</td>";
                            $str .= "<td>{$data['housing_placement']}</td>";
                            $str .= "</tr>";
                            $str .= "<tr>";
                            $str .= "<td>Housing Rent for {$data['week']} &nbsp; {$data['weekText']} &nbsp; [{$data['accommodation']}]</td>";
                            $str .= "<td>{$data['housing_rent']}</td>";
                            $str .= "</tr>";
                            if( $data['extra'] != "") {
                                $str .= "<tr>";
                                $str .= "<td>Accommodation Extra Day [{$data['extra']}]</td>";
                                $str .= "<td>\${$data['extra_day']}</td>";
                                $str .= "</tr>";
                            }
                            $str .= "<tr>";
                            $str .= "<td>Security Deposit (Refundable)</td>";
                            $str .= " <td>{$data['security_deposit']}</td>";
                            $str .= "</tr>";
                        }
                        if( $data['transport'] != "") {
                            $str .= "<tr>";
                            $str .= "<td>Airport Pick-up (One-way)</td>";
                            $str .= "<td>{$data['transport']}</td>";
                            $str .= "</tr>";
                        }
                    $str .= "</tbody>";
                }
            $str .= "</table>";
        $str .= "</div>";

        return $str;
    }
}