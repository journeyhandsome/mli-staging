<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <img :src="`/assets${details.image}`" :alt="details.title" class="w-100" />

        <div v-for="(info, index) in details.categories" :key="`day-at-mli-cat-${index}`">
          <h2>{{ info.title }}</h2>
          <paragraph :desc="info.description" />

          <template v-if="info.dates">
            <div class="dates">
              <paragraph :desc="info.dates" />
            </div>
          </template>

          <template v-if="info.groups" class="mt-5">
            <div class="groups" v-for="(info, index) in info.groups" :key="`day-at-mli-group-${index}`">
              <h3>{{ info.title}}</h3>

              <template v-if="info.listType == 'table'">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <tbody>
                      <tr v-for="(info_t, index) in info.lists" :key="`table-${index}`">
                        <td>{{ info_t.key }}</td>
                        <td>{{ info_t.value }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </template>
              <template v-else>
                <list-text v-if="info.lists" :listObj="info.lists" :className="info.listType ? info.listType : ''" />
              </template>

              <paragraph :desc="info.description" />
            </div>
          </template>
        </div>
      </div>
    </div>

    <brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`firstday-at-mli/en`).fetch();

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
.dates {
  padding: 20px;
  border: 1px solid #5AACEC;
  border-radius: 10px;
  font-style: italic;

  p {
    font-style: italic;
    margin-bottom: 0;
  }
}
</style>