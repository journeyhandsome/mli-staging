Sent from "Price Email Estimate [{{ global_lang_description($language) }}]".
{!! '<br>' !!}
{!! '<br>' !!}
Name: {{ $data['fname'] }}
{!! '<br>' !!}
Email: {{ $data['email'] }}
{!! '<br>' !!}
Country: {{ $data['country'] }}
{!! '<br>' !!}
Phone: {{ $data['tel'] }}
{!! '<br>' !!}
Should MLI Call? {{ ($data['phone_call'] == 1) ? 'Yes' : 'No' }}
{!! '<br>' !!}
Campus: {{ $data['campus'] }}
{!! '<br>' !!}
How did you know MLI?: {{ $data['media'] }}
{!! '<br>' !!}
Start: {{ $data['time_to_start'] }}
{!! '<br>' !!}
Lead-log: {{ $data['utm_source'] }}
{!! '<br>' !!}
@if($admin)
Message:  {{ $kintone }}
@else
Message: {{ $data['message'] }}
@endif
{!! '<br>' !!}
{!! '<br>' !!}
--
{!! '<br>' !!}
Customer's Inquiry: <br/><br/>  {{ $data['title'] }}  <br/> <br/>    {{ $data['name'] }} ${{ $data['totalPrice'] }}(USD)
<p style="font-size: 18px; font-weight: 600px;">
    @if($data['course_title'])
        {{ $data['course_title'] }}
    @else
        Course: {{ $data['course_description'] }}
    @endif
</p>
<div class="table-responsive" style="margin-top: -30px !important;">
    <table class="table table-striped" style="width: 50%; color: #212529;">
    @if( $language == "jp")
        <thead>
            <tr>
                <th style="vertical-align: bottom; border-bottom: 2px solid #dee2e6; text-align: left;">é …ç›®</th>
                <th style="vertical-align: bottom; border-bottom: 2px solid #dee2e6; text-align: left;">é‡‘é¡</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>入学申込金</td>
                <td>{{ $data['processing_fee'] }}</td>
            </tr>
            <tr>
                <td>授業料金 ({{ $data['week'] }}  {{ $data['weekText'] }})</td>
                <td>{{ $data['tuition'] }}</td>
            </tr>
            @if($data['visa'] == "student_visa")
                <tr>
                    <td>SEVIS費　※ビザ取得に必要な費用</td>
                    <td>{{ $data['sevis'] }}</td>
                </tr>
                <tr>
                <td>I20 郵送料（eメール）<br/>※I-20をFedExで発送をご希望の場合、送料120ドルが追加となります。</td>
                    <td>{{ $data['i20'] }}<br/> &nbsp;</td>
                </tr>
            @endif
            @if($data['accommodationKey'] != "no")
                <tr>
                    <td>入居費</td>
                    <td>{{ $data['housing_placement'] }}</td>
                </tr>
                <tr>
                    <td>滞在費 {{ $data['week'] }} {{ $data['weekText'] }} [{{ $data['accommodation'] }}]</td>
                    <td>{{ $data['housing_rent'] }}</td>
                </tr>
                @if($data['extra'] != "")
                    <tr>
                        <td>Accommodation Extra Day [{{ $data['extra'] }}]</td>
                        <td>${{ $data['extra_day'] }}</td>
                    </tr>
                @endif
                <tr>
                    <td>敷金・保証金（一部、返金あり）</td>
                    <td>{{ $data['security_deposit'] }}</td>
                </tr>
            @endif
            @if($data['transport'] != "")
                <tr>
                    <td>空港ピックアップ費用</td>
                    <td>{{ $data['transport'] }}</td>
                </tr>
            @endif
        </tbody>
    @else
        <thead>
            <tr>
                <th style="vertical-align: bottom; border-bottom: 2px solid #dee2e6; text-align: left;">Heading</th>
                <th style="vertical-align: bottom; border-bottom: 2px solid #dee2e6; text-align: left;">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Processing Fee</td>
                <td>{{ $data['processing_fee'] }}</td>
            </tr>
            <tr>
                <td>Tuition ({{ $data['week'] }}  {{ $data['weekText'] }})</td>
                <td>{{ $data['tuition'] }}</td>
            </tr>
            @if($data['visa'] == "student_visa")
                <tr>
                    <td>SEVIS Fee</td>
                    <td>{{ $data['sevis'] }}</td>
                </tr>
                <tr>
                @if($language == "ar")
                        <td>رسوم إرسال I20 عبر البريد الإلكتروني <br/> *إذا طلبت FedEx إرسال نموذج I-20، فستتم إضافة رسوم شحن بقيمة 120 دولارًا.</td>
                @elseif($language == "ch")
                        <td>I20 通过电子邮件发送费用 <br/> *如果要求通过联邦快递寄送 I-20，则需加收 120 美元的运费。</td>
                @elseif($language == "de")
                        <td>I20-Versandgebühr per E-Mail<br/> *Wenn ein I-20 per FedEx verschickt werden soll, fällt eine Versandgebühr von 120 $ an.</td>
                @elseif($language == "fr")
                        <td>Frais d'envoi I20 par email <br /> *Si un I-20 doit être envoyé par FedEx, des frais d'expédition de 120 $ seront ajoutés.</td>
                @elseif($language == "it")
                        <td>Commissione di invio I20 via e-mail <br/> *Se viene richiesto l'invio di un I-20 tramite FedEx, verrà aggiunta una tariffa di spedizione di $ 120.</td>
                @elseif($language == "kr")
                        <td>이메일을 통한 I20 전송 수수료 <br />*I-20을 FedEx로 보내달라고 요청하는 경우 $120의 배송비가 추가됩니다.</td>
                @elseif($language == "por")
                        <td>Taxa de envio I20 por e-mail <br/> *Se for solicitado o envio de um I-20 pela FedEx, uma taxa de envio de US$ 120 será adicionada.</td>
                @elseif($language == "ru")
                        <td>Плата за отправку I20 по электронной почте <br/> *Если FedEx запрашивает отправку формы I-20, к ней будет добавлена ​​плата за доставку в размере 120 долларов США.</td>
                @elseif($language == "sp")
                        <td>Tarifa de envío I20 por correo electrónico <br/> *Si se solicita que FedEx envíe un I-20, se agregará una tarifa de envío de $120.</td>
                @elseif($language == "th")
                        <td>ค่าธรรมเนียมการส่ง I20 ทางอีเมล <br/> *หาก FedEx ร้องขอให้ส่ง I-20 จะมีการบวกค่าธรรมเนียมการจัดส่ง 120 ดอลลาร์</td>
                @elseif($language == "tr")
                        <td>E-posta yoluyla I20 gönderme ücreti <br/> *FedEx tarafından bir I-20 gönderilmesi talep edilirse, 120$ nakliye ücreti eklenecektir.</td>
                @elseif($language == "tw")
                        <td>I20 透過電子郵件發送費用 <br/> *如果要求透過聯邦快遞寄送 I-20，則需加收 120 美元的運費。</td>
                @else
                    <td>I20 sending fee via email <br/> *If an I-20 is requested to be sent by FedEx, a shipping fee of $120 will be added.</td>
                @endif
                    <td>{{ $data['i20'] }}<br/> &nbsp;</td>
                </tr>
            @endif
            @if($data['accommodationKey'] != "no")
                <tr>
                    <td>Housing Placement Fee</td>
                    <td>{{ $data['housing_placement'] }}</td>
                </tr>
                <tr>
                    <td>Housing Rent for {{ $data['week'] }} {{ $data['weekText'] }} [{{ $data['accommodation'] }}]</td>
                    <td>{{ $data['housing_rent'] }}</td>
                    </tr>
                @if($data['extra'] != "")
                    <tr>
                        <td>Accommodation Extra Day [{{ $data['extra'] }}]</td>
                        <td>${{ $data['extra_day'] }}</td>
                    </tr>
                @endif
                <tr>
                    <td>Security Deposit (Refundable)</td>
                    <td>{{ $data['security_deposit'] }}</td>
                </tr>
            @endif
            @if($data['transport'] != "")
                <tr>
                    <td>Airport Pick-up (One-way)</td>
                    <td>{{ $data['transport'] }}</td>
                </tr>
            @endif
        </tbody>
    @endif
    </table>
</div>

{!! '<br>' !!}
This e-mail was sent from a price email estimate form on Mentor Language Institute (http://mliesl.edu)
