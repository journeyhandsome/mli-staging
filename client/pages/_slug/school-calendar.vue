<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 calendar" v-for="(info, index) in details.calendar" :key="`calendar-${index}`">
        <h2>{{ info.year }}</h2>
        <img :src="`/assets${info.image}`" :alt="info.year" class="w-75" data-toggle="modal" :data-target="`.year-${info.year}`" />
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <paragraph :desc="details.notes" />

        <h2>{{ details.schoolCalendar.title }}</h2>
        <paragraph :desc="details.schoolCalendar.description" />
        <div class="table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr v-for="(info_t, index) in details.schoolCalendar.lists" :key="`table-${index}`">
                <td>{{ info_t.key }}</td>
                <td>
                  <paragraph :desc="info_t.value" />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h2>{{ details.faq.title }}</h2>
        <div class="faq" v-for="(info_l, info_i) in details.faq.lists" :key="`faq-lists-${info_i}`">
          <p v-html="info_l.key"></p>
          <paragraph :desc="info_l.value" />

          <template v-if="info_l.note">
            <div class="yellow-bg-notes">
              <p>{{ info_l.note }}</p>
            </div>
          </template>
        </div>
      </div>
    </div>

    <brochure />

    <div class="modal fade year-2026" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <img :src="`/assets${details.calendar[0].image}`" :alt="2026" />
        </div>
      </div>
    </div>
    <div class="modal fade year-2027" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <img :src="`/assets${details.calendar[1].image}`" :alt="2027" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`school-calendar/${params.slug}`).fetch();

			return {
				details
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
		}
	}
</script>

<style lang="scss" scoped>
.calendar {
  text-align: center;

  h2 {
    text-align: center;
  }
}
.modal.fade img {
  max-height: 90vh;
}
.yellow-bg-notes {
  margin: 20px 0;
}
.faq p {
  margin-bottom: 0rem;
}
</style>
