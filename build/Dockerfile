FROM adminer:latest

# Store PHP Configs at /usr/local/etc/php/conf.d
COPY --chown=root:root ./php-conf.d/* /usr/local/etc/php/conf.d/

# We expose Adminer on port 8080 (Adminer's default)
EXPOSE 8080
