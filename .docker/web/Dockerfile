FROM node:20

RUN npm i -g vite @vitejs/plugin-react vite-plugin-eslint env-cmd
WORKDIR /app

EXPOSE 3000

ADD files/init.sh /init.sh
RUN chmod +x /init.sh

CMD /init.sh
