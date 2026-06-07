FROM nginx:alpine

# Copy custom Nginx config with Reverse Proxy
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Copy static website files
COPY index.html /usr/share/nginx/html/index.html
COPY assets/ /usr/share/nginx/html/assets/

EXPOSE 80