#!/bin/sh

. "`dirname $0`"/.env

echo Pushing image to docker.io as \"$MAIN_TAG\" and \"$SPECIFIC_TAG\"...

docker push $IMAGE_NAME:$MAIN_TAG
docker push $IMAGE_NAME:$SPECIFIC_TAG
