install:
		install -d $(DESTDIR)/var/www
		cp -R root/var/www/* $(DESTDIR)/var/www/

