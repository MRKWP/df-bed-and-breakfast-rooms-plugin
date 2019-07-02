WP_VERSION=$(wp core version);
WP_TESTS_TAG="tags/$WP_VERSION"
WP_TESTS_DIR="./tests/wordpress-tests-lib"
WP_CORE_DIR="../../../";
DB_USER=$(wp eval 'echo DB_USER;')
DB_PASS=$(wp eval 'echo DB_PASSWORD;')
DB_HOST=$(wp eval 'echo DB_HOST;')
DB_PREFIX=$(wp eval 'global $wpdb; echo $wpdb->prefix;')
WP_DOMAIN=$(wp eval 'echo parse_url(get_site_url(),PHP_URL_HOST);');
DB_NAME=$(wp eval 'echo DB_NAME;')
DB_NAME=${DB_NAME}_dev;

mysql -h $DB_HOST -u $DB_USER -p$DB_PASS -e "DROP DATABASE IF EXISTS  $DB_NAME";
mysql -h $DB_HOST -u $DB_USER -p$DB_PASS -e "create database $DB_NAME";

download() {
    if [ `which curl` ]; then
        curl -s "$1" > "$2";
    elif [ `which wget` ]; then
        wget -nv -O "$2" "$1"
    fi
}

mkdir -p $WP_TESTS_DIR
download https://develop.svn.wordpress.org/${WP_TESTS_TAG}/wp-tests-config-sample.php "$WP_TESTS_DIR"/wp-tests-config.php
svn co --quiet https://develop.svn.wordpress.org/${WP_TESTS_TAG}/tests/phpunit/includes/ $WP_TESTS_DIR/includes
svn co --quiet https://develop.svn.wordpress.org/${WP_TESTS_TAG}/tests/phpunit/data/ $WP_TESTS_DIR/data


mkdir -p $WP_TESTS_DIR/src;
wp core download --path=$WP_TESTS_DIR/src;

sed -i "s/youremptytestdbnamehere/$DB_NAME/" "$WP_TESTS_DIR"/wp-tests-config.php
sed -i "s/yourusernamehere/$DB_USER/" "$WP_TESTS_DIR"/wp-tests-config.php
sed -i "s/yourpasswordhere/$DB_PASS/" "$WP_TESTS_DIR"/wp-tests-config.php
sed -i "s/wptests_/$DB_PREFIX/" "$WP_TESTS_DIR"/wp-tests-config.php
sed -i "s/example\.org/$WP_DOMAIN/" "$WP_TESTS_DIR"/wp-tests-config.php
sed -i "s|localhost|${DB_HOST}|" "$WP_TESTS_DIR"/wp-tests-config.php
