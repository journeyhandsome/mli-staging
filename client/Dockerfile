FROM node:12.16.3-alpine3.9

WORKDIR /var/www/html/nuxt-app
COPY . .
RUN npm install

RUN npm run build

EXPOSE 3000

ENV NUXT_HOST=0.0.0.0

ENV NUXT_PORT=3000

CMD [ "npm", "start" ]