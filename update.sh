#!/bin/bash
# https://developer.wordpress.org/plugins/wordpress-org/how-to-use-subversion/

echo "Update files in trunk"
cp -p *.php *.md release-svn/trunk

echo TODO read version tag from input

echo TODO Tag the release
# svn cp trunk tags/<new version number>

echo TODO Check in the update
# svn ci -m "tagging version <new version number>"


