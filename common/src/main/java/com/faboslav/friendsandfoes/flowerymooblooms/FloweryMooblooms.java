package com.faboslav.friendsandfoes.flowerymooblooms;

import net.minecraft.resources.ResourceLocation;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public final class FloweryMooblooms
{
	public static final String MOD_ID = "flowerymooblooms";
	private static final Logger LOGGER = LoggerFactory.getLogger(FloweryMooblooms.MOD_ID);

	public static ResourceLocation makeID(String path) {
		return ResourceLocation.fromNamespaceAndPath(
			MOD_ID,
			path
		);
	}

	public static Logger getLogger() {
		return LOGGER;
	}
}
