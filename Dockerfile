FROM php:apache

COPY . /app

WORKDIR /app

RUN apt-get update && apt-get install -y nodejs npm

RUN npm install -g sass

RUN npm run compile

EXPOSE 8080

CMD ["npm", "run", "serve"]