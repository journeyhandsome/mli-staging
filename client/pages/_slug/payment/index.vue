<template>
  <div class="container">
    <div class="col-lg-12">
      <h1>{{ details.title }}</h1>
    <paragraph v-if="details.subtitle" :desc="details.subtitle" />
      <form v-on:submit.prevent="onSubmit" method="post">
        <h3> {{ details.studentInfo.title }}</h3> 
        <form-handler :formInfos="details.studentInfo.form" ref="studentForm"/>
          <template v-if="lang == 'ar'">
            <div class="form-group mb-4">
            <label class="labelClass">تفاصيل الدفع</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">رسوم المعالجة</option>
                <option value="Tuition">الرسوم الدراسية</option>
                <option value="Tuition split payment/ installment">تقسيم الرسوم الدراسية/الدفع بالتقسيط</option>
                <option value="Tuition Deposit">إيداع الرسوم الدراسية</option>
                <option value="Tuition balance">رصيد الرسوم الدراسية</option>
                <option value="Shipping Fee">رسوم الشحن</option>
                <option value="SEVIS Fee">رسوم SEVIS</option>
                <option value="Textbooks">الكتب المدرسية</option>
                <option value="AI TOEFL Test">اختبار TOEFL للذكاء الاصطناعي</option>
                <option value="Official documents">الوثائق الرسمية</option>
                <option value="Others">أخرى</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="يرجى إدخال تفاصيل أخرى هنا" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template> 
        <template v-else-if="lang == 'ch'">
            <div class="form-group mb-4">
            <label class="labelClass">付款详情</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">手续费</option>
                <option value="Tuition">学费</option>
                <option value="Tuition split payment/ installment">学费分期支付/分期付款</option>
                <option value="Tuition Deposit">学费押金</option>
                <option value="Tuition balance">学费余额</option>
                <option value="Shipping Fee">运费</option>
                <option value="SEVIS Fee">SEVIS 费用</option>
                <option value="Textbooks">教科书</option>
                <option value="AI TOEFL Test">AI 托福考试</option>
                <option value="Official documents">正式文件</option>
                <option value="Others">其他</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="请在此处输入其他详细信息" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template> 
        <template v-else-if="lang == 'de'">
            <div class="form-group mb-4">
            <label class="labelClass">Details zur Bezahlung</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">Bearbeitungsgebühr</option>
                <option value="Tuition">Studiengebühren</option>
                <option value="Tuition split payment/ installment">Aufteilung des Schulgeldes/ Ratenzahlung</option>
                <option value="Tuition Deposit">Studiengebühren-Kaution</option>
                <option value="Tuition balance">Saldo der Studiengebühren</option>
                <option value="Shipping Fee">Versandgebühr</option>
                <option value="SEVIS Fee">SEVIS-Gebühr</option>
                <option value="Textbooks">Lehrbücher</option>
                <option value="AI TOEFL Test">AI TOEFL Test</option>
                <option value="Official documents">Offizielle Dokumente</option>
                <option value="Others">Andere</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="Bitte geben Sie hier weitere Details ein" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template> 
        <template v-else-if="lang == 'fr'">
            <div class="form-group mb-4">
            <label class="labelClass">Modalités de paiement</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">Frais de dossier</option>
                <option value="Tuition">Frais de scolarité</option>
                <option value="Tuition split payment/ installment">Paiement fractionné des frais de scolarité</option>
                <option value="Tuition Deposit">Dépôt de garantie</option>
                <option value="Tuition balance">Solde des frais de scolarité</option>
                <option value="Shipping Fee">Frais d'expédition</option>
                <option value="SEVIS Fee">Frais SEVIS</option>
                <option value="Textbooks">Manuels scolaires</option>
                <option value="AI TOEFL Test">Test AI TOEFL</option>
                <option value="Official documents">Documents officiels</option>
                <option value="Others">Autres</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="Veuillez indiquer d'autres détails ici" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template>  
        <template v-else-if="lang == 'it'">
            <div class="form-group mb-4">
            <label class="labelClass">Dettagli sul pagamento</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">Tassa di elaborazione</option>
                <option value="Tuition">Tassa di iscrizione</option>
                <option value="Tuition split payment/ installment">Pagamento frazionato/ rateale della retta</option>
                <option value="Tuition Deposit">Deposito tasse scolastiche</option>
                <option value="Tuition balance">Saldo delle tasse scolastiche</option>
                <option value="Shipping Fee">Spese di spedizione</option>
                <option value="SEVIS Fee">Tassa SEVIS</option>
                <option value="Textbooks">Libri di testo</option>
                <option value="AI TOEFL Test">Test AI TOEFL</option>
                <option value="Official documents">Documenti ufficiali</option>
                <option value="Others">Altri</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="Inserire qui altri dettagli" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template> 
        <template v-else-if="lang == 'jp'">
            <div class="form-group mb-4">
            <label class="labelClass">支払詳細</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">手数料</option>
                <option value="Tuition">授業料</option>
                <option value="Tuition split payment/ installment">分割払い</option>
                <option value="Tuition Deposit">授業料デポジット</option>
                <option value="Tuition balance">授業料残高</option>
                <option value="Shipping Fee">送料</option>
                <option value="SEVIS Fee">SEVIS料金</option>
                <option value="Textbooks">教科書</option>
                <option value="AI TOEFL Test">AI TOEFLテスト</option>
                <option value="Official documents">公式文書</option>
                <option value="Others">その他</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="その他の詳細はこちらにご記入ください。" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template> 
        <template v-else-if="lang == 'kr'">
            <div class="form-group mb-4">
            <label class="labelClass">결제 세부 정보</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">처리 수수료</option>
                <option value="Tuition">등록금</option>
                <option value="Tuition split payment/ installment">수업료 분할 납부/할부</option>
                <option value="Tuition Deposit">수업료 입금</option>
                <option value="Tuition balance">수업료 잔액</option>
                <option value="Shipping Fee">배송비</option>
                <option value="SEVIS Fee">SEVIS 수수료</option>
                <option value="Textbooks">교과서</option>
                <option value="AI TOEFL Test">AI 토플 시험  </option>
                <option value="Official documents">공식 문서</option>
                <option value="Others">기타</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="기타 세부 정보를 여기에 입력하세요." size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template>  
        <template v-else-if="lang == 'por'">
            <div class="form-group mb-4">
            <label class="labelClass">Detalhes do pagamento</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">Taxa de processamento</option>
                <option value="Tuition">Propinas</option>
                <option value="Tuition split payment/ installment">Pagamento fraccionado/em prestações da propina</option>
                <option value="Tuition Deposit">Depósito de propinas</option>
                <option value="Tuition balance">Saldo das propinas</option>
                <option value="Shipping Fee">Taxa de envio</option>
                <option value="SEVIS Fee">Taxa SEVIS</option>
                <option value="Textbooks">Livros didácticos</option>
                <option value="AI TOEFL Test">Teste AI TOEFL</option>
                <option value="Official documents">Documentos oficiais</option>
                <option value="Others">Outros</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="Introduza aqui outros dados" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template>  
        <template v-else-if="lang == 'ru'">
            <div class="form-group mb-4">
            <label class="labelClass">Платежные реквизиты</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">Плата за обработку</option>
                <option value="Tuition">Оплата за обучение</option>
                <option value="Tuition split payment/ installment">Дробная оплата/рассрочка платежа за обучение</option>
                <option value="Tuition Deposit">Депозит за обучение</option>
                <option value="Tuition balance">Остаток средств на оплату обучения</option>
                <option value="Shipping Fee">Стоимость доставки</option>
                <option value="SEVIS Fee">Плата за услуги SEVIS </option>
                <option value="Textbooks">Учебники</option>
                <option value="AI TOEFL Test">Тест AI TOEFL </option>
                <option value="Official documents">Официальные документы</option>
                <option value="Others">Другие</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="Пожалуйста, укажите здесь другие данные" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template>  
        <template v-else-if="lang == 'sp'">
            <div class="form-group mb-4">
            <label class="labelClass">Datos de pago</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">Tasa de tramitación</option>
                <option value="Tuition">Matrícula</option>
                <option value="Tuition split payment/ installment">Pago fraccionado de la matrícula</option>
                <option value="Tuition Deposit">Depósito de matrícula</option>
                <option value="Tuition balance">Saldo de la matrícula</option>
                <option value="Shipping Fee">Gastos de envío</option>
                <option value="SEVIS Fee">Tasa SEVIS</option>
                <option value="Textbooks">Libros de texto</option>
                <option value="AI TOEFL Test">AI Examen TOEFL </option>
                <option value="Official documents">Documentos oficiales</option>
                <option value="Others">Otros</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="Introduzca aquí otros datos" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template> 
        <template v-else-if="lang == 'th'">
            <div class="form-group mb-4">
            <label class="labelClass">รายละเอียดการจ่ายเงิน</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">ค่าธรรมเนียมการดำเนินการ</option>
                <option value="Tuition">การปกครองค่าเล่าเรียน</option>
                <option value="Tuition split payment/ installment">แบ่งชำระค่าเล่าเรียน/ผ่อนชำระ</option>
                <option value="Tuition Deposit">ค่าเล่าเรียน</option>
                <option value="Tuition balance">ยอดคงเหลือค่าเล่าเรียน</option>
                <option value="Shipping Fee">ค่าจัดส่ง</option>
                <option value="SEVIS Fee">ค่าธรรมเนียมเซวิส</option>
                <option value="Textbooks">หนังสือเรียน</option>
                <option value="AI TOEFL Test">แบบทดสอบ AI TOEFL</option>
                <option value="Official documents">เอกสารราชการ</option>
                <option value="Others">คนอื่น</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="กรุณากรอกรายละเอียดอื่นๆ ที่นี่" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template>  
        <template v-else-if="lang == 'tr'">
            <div class="form-group mb-4">
            <label class="labelClass">Ödeme Detayları</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">İşlem Ücreti</option>
                <option value="Tuition">Öğrenim Ücreti</option>
                <option value="Tuition split payment/ installment">Öğrenim ücreti bölünmüş ödeme / taksit</option>
                <option value="Tuition Deposit">Öğrenim Ücreti Depozitosu</option>
                <option value="Tuition balance">Öğrenim bakiyesi</option>
                <option value="Shipping Fee">Nakliye Ücreti</option>
                <option value="SEVIS Fee">SEVIS Ücreti</option>
                <option value="Textbooks">Ders Kitapları</option>
                <option value="AI TOEFL Test">AI TOEFL Sınavı</option>
                <option value="Official documents">Resmi belgeler</option>
                <option value="Others">Diğerleri</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="Lütfen diğer ayrıntıları buraya girin" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template> 
        <template v-else>
            <div class="form-group mb-4">
            <label class="labelClass">付款詳情</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">加費</option>
                <option value="Tuition">學費</option>
                <option value="Tuition split payment/ installment">學費分期付款/分期付款</option>
                <option value="Tuition Deposit">學費押金</option>
                <option value="Tuition balance">學費餘額</option>
                <option value="Shipping Fee">運輸費用</option>
                <option value="SEVIS Fee">SEVIS費</option>
                <option value="Textbooks">教科書</option>
                <option value="AI TOEFL Test">人工智慧托福考試</option>
                <option value="Official documents">官方文件</option>
                <option value="Others">其他的</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="請在此輸入其他詳細信息" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template>     
        <template v-if="isLoading">
          <button class="btn btn-success btn-block" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading... Please Wait
          </button>
        </template>
        <template v-else>
          <button type="submit" style="color: white;" class="btn btn-warning btn-block">{{ details.btn_label }}</button>
        </template>
      </form>
    </div>
  </div>
</template>

<script>
	export default {    
    async asyncData({ $content, $axios, params }) {
      const details = await $content(`payment/${params.slug}`).fetch();
      const lang = params.slug;

      return {
        details,
        lang,
        $axios
      }
    },
    head() {
        if(this.details) {
            return {
                title: this.details.pageTitle,
                meta: [
                    {
                    hid: 'description',
                    name: 'description',
                    content: this.details.pageDescription
                    }
                ],
            }
        }
    },
    data: function() {
      return {
        payment_details: null,
        payment_others: null,
        answeredForm: {
          studentInfo: {
          }
        },
        isLoading: false,
        isRequired: false,
      }
    },
    methods: {
      async onSubmit(e) {
        // console.log('p '+document.getElementById("percent").value);
        e.preventDefault();
        this.isLoading = true;
        const self = this;
        this.answeredForm.studentInfo = Object.assign({}, this.$refs.studentForm.getFormData());
        const { studentInfo } = this.answeredForm;
        const dataFields = {
              language : this.lang,
              fname: studentInfo.fname,
              lname: studentInfo.lname,
              agency: studentInfo.agency,
              date: studentInfo.date,
              campus: studentInfo.campus,
              amount: studentInfo.amount,
              percent: studentInfo.percent ? studentInfo.percent : document.getElementById("percent").value,
              payment_details : this.payment_details,
              payment_others : this.payment_others,  
        };
        console.log(dataFields);
        await this.$axios.post('/api/payment', dataFields).then(function(response) {
          self.isLoading = false;
          window.location.href=response.data.Location;
        }).catch(function(error) {
          console.log('error: ', error);
          self.loading = false;
        });
      }
    }
	}
</script>

<style lang="scss" scoped>
.labelClass {
  font-size: 1rem;
  line-height: 1.5; 
  color: #212529;
  font-weight: 700;
}
</style>