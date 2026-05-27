val IS_CI = System.getenv("CI") == "true"

plugins {
	id("dev.kikugie.stonecutter")
	id("net.neoforged.moddev") version "2.0.140" apply false
	id("net.fabricmc.fabric-loom") version "1.15-SNAPSHOT" apply false
	id("net.fabricmc.fabric-loom-remap") version "1.15-SNAPSHOT" apply false
}

stonecutter {
	parameters {
		filters.exclude("**/*.accesswidener")

		replacements.string(current.parsed >= "1.21.11") {
			replace("ResourceLocation", "Identifier")
			replace("net.minecraft.Util", "net.minecraft.util.Util")
		}
	}
}

if (IS_CI) stonecutter active null
else stonecutter active "26.1.2" /* [SC] DO NOT EDIT */