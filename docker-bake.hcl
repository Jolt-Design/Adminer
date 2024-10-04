variable "platforms" {
  default = ["linux/amd64", "linux/arm64"]
}

group "default" {
  targets = ["adminer"]
}

target "adminer" {
  context = "build"

  platforms = platforms
  tags = ["joltdesign/adminer:latest"]
}
