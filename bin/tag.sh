#!/bin/sh

. "`dirname $0`"/.env

echo Tagging image $IMAGE_NAME as \"$MAIN_TAG\" and \"$SPECIFIC_TAG\"...

docker tag $IMAGE_NAME:latest $IMAGE_NAME:$MAIN_TAG
docker tag $IMAGE_NAME:latest $IMAGE_NAME:$SPECIFIC_TAG
