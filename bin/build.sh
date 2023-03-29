#!/bin/sh

. "`dirname $0`"/.env

if [ "x$1" = "xdev" ]; then
	BUILD_SUFFIX=-dev
	BUILD_ARGS=--build-arg=DEVBUILD=1
elif [ "x$1" = "x--no-cache" ] || [ "x$2" = "x--no-cache" ]; then
	BUILD_ARGS="${BUILD_ARGS:-} --no-cache"
fi

docker buildx build --platform $BUILD_PLATFORM -t ${IMAGE_NAME}${BUILD_SUFFIX:-} ${BUILD_ARGS:-} $SOURCE_PATH
