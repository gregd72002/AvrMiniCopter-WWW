install:
		install -d $(DESTDIR)/var/www
		cp -R www/* $(DESTDIR)/var/www/

