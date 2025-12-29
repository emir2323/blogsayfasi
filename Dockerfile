FROM php:8.2-apache

# Modülleri etkinleştir
RUN a2enmod rewrite headers

# Apache .htaccess override izni
RUN echo '<Directory /var/www/html/>' >> /etc/apache2/conf-available/override.conf && \
    echo '    AllowOverride All' >> /etc/apache2/conf-available/override.conf && \
    echo '</Directory>' >> /etc/apache2/conf-available/override.conf && \
    a2enconf override

# Çalışma dizinini ayarla
WORKDIR /var/www/html

# Dosyaları kopyala
COPY . /var/www/html/

# RewriteBase ayarlaması artık .htaccess içinde yapıldığı için sed komutuna gerek yok.
# RUN sed -i 's/RewriteBase \/blogsayfasi\//RewriteBase \//g' /var/www/html/.htaccess

# İzinleri ayarla (Apache user: www-data)
RUN chown -R www-data:www-data /var/www/html

# Portu dışa aç
EXPOSE 80
