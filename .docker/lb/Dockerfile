FROM nginx:latest
MAINTAINER Chris Burton <csburton@gmail.com>

ARG APP_PREFIX
ENV APP_PREFIX=${APP_PREFIX}


COPY ./config/default.conf /etc/nginx/conf.d/default.conf
COPY ./config/nginx.conf /etc/nginx/nginx.conf
COPY ./config/proxy.conf /etc/nginx/proxy.conf
RUN mkdir /etc/nginx/ssl
COPY ./config/ssl/* /etc/nginx/ssl/


RUN set -e; \
    esc="$(printf '%s' "$APP_PREFIX" | sed -e 's/[\\\/&]/\\&/g')"; \
    sed -i "s|\${APP_PREFIX}|$esc|g" /etc/nginx/conf.d/default.conf

RUN set -e; \
    esc="$(printf '%s' "$APP_PREFIX" | sed -e 's/[\\\/&]/\\&/g')"; \
    sed -i "s|\${APP_PREFIX}|$esc|g" /etc/nginx/proxy.conf


RUN echo cat /etc/nginx/conf.d/default.conf
