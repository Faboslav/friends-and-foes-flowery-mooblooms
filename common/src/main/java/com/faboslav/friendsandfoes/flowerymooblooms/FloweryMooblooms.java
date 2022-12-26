package com.faboslav.friendsandfoes.flowerymooblooms;

import com.faboslav.friendsandfoes.api.MoobloomVariants;
import net.minecraft.block.Blocks;
import net.minecraft.block.PlantBlock;
import net.minecraft.util.Identifier;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public final class FloweryMooblooms
{
	public static final String MOD_ID = "flowerymooblooms";
	private static final Logger LOGGER = LoggerFactory.getLogger(FloweryMooblooms.MOD_ID);

	public static Identifier makeID(String path) {
		return new Identifier(
			MOD_ID,
			path
		);
	}

	public static Logger getLogger() {
		return LOGGER;
	}

	public static void postInit() {
		MoobloomVariants.add("allium", (PlantBlock) Blocks.ALLIUM);
		MoobloomVariants.add("azure_bluet", (PlantBlock) Blocks.AZURE_BLUET);
		MoobloomVariants.add("blue_orchid", (PlantBlock) Blocks.BLUE_ORCHID);
		MoobloomVariants.add("cornflower", (PlantBlock) Blocks.CORNFLOWER);
		MoobloomVariants.add("dandelion", (PlantBlock) Blocks.DANDELION);
		MoobloomVariants.add("lilac", (PlantBlock) Blocks.LILAC);
		MoobloomVariants.add("lily_of_the_valley", (PlantBlock) Blocks.LILY_OF_THE_VALLEY);
		MoobloomVariants.add("oxeye_daisy", (PlantBlock) Blocks.OXEYE_DAISY);
		MoobloomVariants.add("peony", (PlantBlock) Blocks.PEONY);
		MoobloomVariants.add("poppy", (PlantBlock) Blocks.POPPY);
		MoobloomVariants.add("rose_bush", (PlantBlock) Blocks.ROSE_BUSH);
		MoobloomVariants.add("sunflower", (PlantBlock) Blocks.SUNFLOWER);
		MoobloomVariants.add("orange_tulip", (PlantBlock) Blocks.ORANGE_TULIP);
		MoobloomVariants.add("pink_tulip", (PlantBlock) Blocks.PINK_TULIP);
		MoobloomVariants.add("red_tulip", (PlantBlock) Blocks.RED_TULIP);
		MoobloomVariants.add("white_tulip", (PlantBlock) Blocks.WHITE_TULIP);
	}
}
